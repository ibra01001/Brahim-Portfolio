<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Services\GeminiChatService;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;

class Chatbot extends Component
{
    #[Validate('required|string|min:1|max:500')]
    public string $message = '';

    public array $conversation = [];
    public bool $loading = false;
    public bool $isOpen = false;

    private const MAX_CONVERSATION = 20; // keep payload small for Livewire
    private const RATE_LIMIT_PER_MINUTE = 8;
    private const RATE_LIMIT_PER_HOUR = 40;

    public function mount()
    {
        $this->conversation = [
            [
                'role' => 'assistant',
                'content' => '👋 Hey there! I\'m Ibrahim Remili (well, the AI version of me). I\'m a Full Stack Developer building web applications. Feel free to ask me about my projects, skills, or experience!',
                'timestamp' => now()->format('H:i'),
            ],
        ];
    }

    public function send(GeminiChatService $chat)
    {
        $this->validateOnly('message');

        $trimmed = trim($this->message);
        if ($trimmed === '') {
            return;
        }

        // Rate limiting per IP + session
        $ip = request()->ip() ?? 'unknown';
        $keyMin = 'chatbot:' . $ip . ':min';
        $keyHour = 'chatbot:' . $ip . ':hour';
        $keySession = 'chatbot:session:' . session()->getId();

        if (RateLimiter::tooManyAttempts($keyMin, self::RATE_LIMIT_PER_MINUTE)) {
            $seconds = RateLimiter::availableIn($keyMin);
            $this->addError('message', "Too many messages. Please wait {$seconds}s.");
            return;
        }
        if (RateLimiter::tooManyAttempts($keyHour, self::RATE_LIMIT_PER_HOUR)) {
            $this->addError('message', 'Hourly limit reached. Please try again later.');
            return;
        }
        if (RateLimiter::tooManyAttempts($keySession, self::RATE_LIMIT_PER_MINUTE)) {
            $this->addError('message', 'Please slow down.');
            return;
        }

        RateLimiter::hit($keyMin, 60);
        RateLimiter::hit($keyHour, 3600);
        RateLimiter::hit($keySession, 60);

        // Sanitize length already validated, extra strip
        $userMessage = mb_substr(trim($this->message), 0, 500);
        $this->message = '';
        $this->resetErrorBag('message');

        $this->conversation[] = [
            'role' => 'user',
            'content' => $userMessage,
            'timestamp' => now()->format('H:i'),
        ];

        $this->loading = true;

        try {
            $reply = $chat->replyAsIbrahim($userMessage);
        } catch (\Throwable $e) {
            Log::error('Chatbot send failed', ['msg' => $e->getMessage()]);
            $reply = 'Sorry, I encountered an error. Please try again later.';
        }

        $this->conversation[] = [
            'role' => 'assistant',
            'content' => $reply,
            'timestamp' => now()->format('H:i'),
        ];

        // Trim conversation to keep Livewire payload small
        if (count($this->conversation) > self::MAX_CONVERSATION) {
            $this->conversation = array_slice($this->conversation, -self::MAX_CONVERSATION);
            // Always keep welcome message at start after trim?
            if ($this->conversation[0]['role'] !== 'assistant') {
                array_unshift($this->conversation, [
                    'role' => 'assistant',
                    'content' => '👋 Hey again! Continuing our chat.',
                    'timestamp' => now()->format('H:i'),
                ]);
                $this->conversation = array_slice($this->conversation, -self::MAX_CONVERSATION);
            }
        }

        $this->loading = false;
    }

    public function toggleChat()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function clearChat()
    {
        $this->conversation = [
            [
                'role' => 'assistant',
                'content' => '👋 Hey again!',
                'timestamp' => now()->format('H:i'),
            ],
        ];
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.chatbot');
    }
}
