<!-- AI Chat Section — Brutalist, matches home page style -->
<section class="min-h-screen relative overflow-hidden py-16 md:py-24">

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <!-- Section Header -->
        <div class="mb-14 md:mb-20">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-3 h-3 bg-[#FF6B55] rounded-sm flex-shrink-0"></div>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#3D3D3D]"
                    style="font-family: 'Space Grotesk', sans-serif;">
                    AI Assistant
                </span>
            </div>
            <h2 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-[#1A1A1A] leading-tight max-w-2xl"
                style="font-family: 'Space Grotesk', sans-serif;">
                Ask me<br>
                <span class="relative inline-block">
                    anything.
                    <svg width="100%" height="12" viewBox="0 0 300 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="absolute -bottom-1 left-0 w-full"
                        preserveAspectRatio="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2 6C50 2 100 10 150 6C200 2 250 10 298 6"
                            stroke="#FF6B55" stroke-width="3.5" stroke-linecap="round" fill="none" />
                    </svg>
                </span>
            </h2>
            <p class="mt-6 text-base md:text-lg text-[#3D3D3D] max-w-xl leading-relaxed"
                style="font-family: 'Inter', sans-serif;">
                Got questions about my work, stack, or experience? The AI assistant has the answers.
            </p>
        </div>

        <!-- Mobile Tab Switcher -->
        <div class="flex lg:hidden mb-5 border-2 border-[#1A1A1A] overflow-hidden">
            <button id="tab-chat" onclick="switchTab('chat')"
                class="flex-1 py-3.5 text-xs font-bold uppercase tracking-widest bg-[#1A1A1A] text-white transition-all"
                style="font-family: 'Space Grotesk', sans-serif;">
                Chat
            </button>
            <button id="tab-topics" onclick="switchTab('topics')"
                class="flex-1 py-3.5 text-xs font-bold uppercase tracking-widest bg-white text-[#1A1A1A] transition-all"
                style="font-family: 'Space Grotesk', sans-serif;">
                Quick Topics
            </button>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8 items-start">

            <!-- LEFT SIDEBAR — desktop only -->
            <div class="hidden lg:flex lg:col-span-1 flex-col gap-5">

                <!-- Quick Topics Card -->
                <div class="bg-white border-2 border-[#1A1A1A] p-6">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-2.5 h-2.5 bg-[#FF6B55] flex-shrink-0"></div>
                        <h3 class="font-extrabold text-[#1A1A1A] text-xs uppercase tracking-[0.2em]"
                            style="font-family: 'Space Grotesk', sans-serif;">
                            Quick Topics
                        </h3>
                    </div>
                    <div class="space-y-2.5">
                        @foreach([
                        'What are your skills?',
                        'Tell me about your projects',
                        'How can I contact you?',
                        ] as $suggestion)
                        <button
                            type="button"
                            wire:click="$set('message', '{{ $suggestion }}')"
                            class="w-full flex items-center justify-between gap-3 px-4 py-3.5 bg-[#F5F3EF] border-2 border-[#1A1A1A] text-[#1A1A1A] hover:bg-[#FF6B55] hover:text-white hover:border-[#FF6B55] font-semibold transition-all duration-150 text-sm text-left group"
                            style="font-family: 'Inter', sans-serif;"
                            {{ $loading ? 'disabled' : '' }}>
                            <span class="leading-tight">{{ $suggestion }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-3.5 w-3.5 flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                        @endforeach
                    </div>
                </div>

                <!-- Status Card -->
                <div class="bg-[#1A1A1A] border-2 border-[#1A1A1A] p-6 relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 w-24 h-24 border-2 border-[#FF6B55] opacity-20 pointer-events-none rotate-12"></div>
                    <div class="absolute right-4 bottom-4 w-10 h-10 bg-[#FF6B55] opacity-10 pointer-events-none"></div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-2.5 h-2.5 bg-[#AEF45D] ai-pulse"></div>
                            <span class="font-bold text-xs uppercase tracking-[0.2em] text-white"
                                style="font-family: 'Space Grotesk', sans-serif;">
                                Online Now
                            </span>
                        </div>
                        <p class="text-sm text-white/50 leading-relaxed"
                            style="font-family: 'Inter', sans-serif;">
                            Powered by Gemini. Instant answers about my portfolio, stack, and services.
                        </p>
                    </div>
                </div>

                <!-- Decorative label -->
                <div class="border-2 border-[#1A1A1A] px-4 py-3 flex items-center gap-3 bg-[#F5F3EF]">
                    <div class="w-2 h-2 bg-[#1A1A1A] rotate-45 flex-shrink-0"></div>
                    <p class="text-xs text-[#3D3D3D] font-medium"
                        style="font-family: 'Inter', sans-serif;">
                        No login required &mdash; just ask
                    </p>
                </div>
            </div>

            <!-- Mobile Topics Panel -->
            <div id="topics-panel" class="hidden lg:hidden col-span-1">
                <div class="bg-white border-2 border-[#1A1A1A] p-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        @foreach([
                        'What are your skills?',
                        'Tell me about your projects',
                        'How can I contact you?',
                        ] as $suggestion)
                        <button
                            type="button"
                            wire:click="$set('message', '{{ $suggestion }}')"
                            onclick="switchTab('chat')"
                            class="flex items-center gap-3 px-4 py-3.5 bg-[#F5F3EF] border-2 border-[#1A1A1A] text-[#1A1A1A] hover:bg-[#FF6B55] hover:text-white hover:border-[#FF6B55] font-semibold transition-all text-sm text-left"
                            style="font-family: 'Inter', sans-serif;"
                            {{ $loading ? 'disabled' : '' }}>
                            <span>{{ $suggestion }}</span>
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- CHAT PANEL -->
            <div id="chat-panel" class="lg:col-span-2 col-span-1">
                <div class="bg-white border-2 border-[#1A1A1A] overflow-hidden flex flex-col chat-container">

                    <!-- Chat Header -->
                    <div class="bg-[#1A1A1A] px-5 sm:px-7 py-4 flex-shrink-0">
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center gap-4 min-w-0">
                                <!-- Avatar -->
                                <div class="w-10 h-10 bg-[#FF6B55] border-2 border-white/20 flex items-center justify-center font-extrabold text-white text-xs flex-shrink-0"
                                    style="font-family: 'Space Grotesk', sans-serif;">
                                    AI
                                </div>
                                <div class="min-w-0">
                                    <h3 class="font-extrabold text-white text-sm sm:text-base truncate"
                                        style="font-family: 'Space Grotesk', sans-serif;">
                                        Portfolio Assistant
                                    </h3>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <div class="w-2 h-2 bg-[#AEF45D] ai-pulse flex-shrink-0"></div>
                                        <p class="text-xs text-white/40 truncate"
                                            style="font-family: 'Inter', sans-serif;">
                                            Always online &bull; Instant replies
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Clear button -->
                            <button
                                wire:click="clearChat"
                                class="flex-shrink-0 flex items-center gap-2 px-3.5 py-2 border-2 border-white/20 text-white/50 hover:bg-white/10 hover:text-white hover:border-white/40 transition-all text-xs font-bold uppercase tracking-widest"
                                style="font-family: 'Space Grotesk', sans-serif;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                <span class="hidden sm:inline">Clear</span>
                            </button>
                        </div>
                    </div>

                    <!-- Accent bar -->
                    <div class="h-[3px] bg-[#FF6B55] flex-shrink-0"></div>

                    <!-- Messages -->
                    <div
                        class="flex-1 overflow-y-auto p-5 sm:p-7 space-y-5 bg-[#F5F3EF] chat-messages"
                        id="messages-container">

                        @forelse($conversation as $index => $msg)
                        <div class="flex {{ $msg['role'] === 'user' ? 'justify-end' : 'justify-start' }} msg-fadein">
                            <div class="flex gap-3 max-w-[88%] sm:max-w-[80%] {{ $msg['role'] === 'user' ? 'flex-row-reverse' : 'flex-row' }}">

                                <!-- Avatar -->
                                <div class="flex-shrink-0 w-9 h-9 border-2 border-[#1A1A1A] flex items-center justify-center font-extrabold text-xs
                                    {{ $msg['role'] === 'user' ? 'bg-[#1A1A1A] text-white' : 'bg-[#FF6B55] text-white' }}"
                                    style="font-family: 'Space Grotesk', sans-serif;">
                                    {{ $msg['role'] === 'user' ? 'U' : 'AI' }}
                                </div>

                                <!-- Bubble -->
                                <div class="flex flex-col {{ $msg['role'] === 'user' ? 'items-end' : 'items-start' }}">
                                    <div class="px-4 py-3 border-2 border-[#1A1A1A]
                                        {{ $msg['role'] === 'user'
                                            ? 'bg-[#1A1A1A] text-white'
                                            : 'bg-white text-[#1A1A1A]' }}">
                                        <p class="text-sm leading-relaxed whitespace-pre-wrap break-words"
                                            style="font-family: 'Inter', sans-serif;">
                                            {{ $msg['content'] }}
                                        </p>
                                    </div>
                                    <span class="text-[11px] text-[#3D3D3D]/40 mt-2 px-0.5"
                                        style="font-family: 'Inter', sans-serif;">
                                        {{ $msg['timestamp'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @empty

                        <!-- Welcome State -->
                        <div class="flex flex-col items-center justify-center h-full text-center py-8 px-6">
                            <div class="w-16 h-16 bg-[#FF6B55] border-2 border-[#1A1A1A] flex items-center justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>

                            <h3 class="text-2xl font-extrabold text-[#1A1A1A] mb-2"
                                style="font-family: 'Space Grotesk', sans-serif;">
                                Start a conversation
                            </h3>
                            <p class="text-[#3D3D3D] text-sm max-w-xs leading-relaxed"
                                style="font-family: 'Inter', sans-serif;">
                                Ask about projects, skills, experience &mdash; anything you want to know.
                            </p>

                            <div class="mt-7 flex gap-2 flex-wrap justify-center">
                                <span class="px-3.5 py-1.5 bg-white border-2 border-[#1A1A1A] text-xs font-bold text-[#1A1A1A] uppercase tracking-wide"
                                    style="font-family: 'Space Grotesk', sans-serif;">
                                    Skills
                                </span>
                                <span class="px-3.5 py-1.5 bg-white border-2 border-[#1A1A1A] text-xs font-bold text-[#1A1A1A] uppercase tracking-wide"
                                    style="font-family: 'Space Grotesk', sans-serif;">
                                    Projects
                                </span>
                                <span class="px-3.5 py-1.5 bg-white border-2 border-[#1A1A1A] text-xs font-bold text-[#1A1A1A] uppercase tracking-wide"
                                    style="font-family: 'Space Grotesk', sans-serif;">
                                    Contact
                                </span>
                            </div>
                        </div>

                        @endforelse

                        <!-- Typing indicator -->
                        @if($loading)
                        <div class="flex justify-start msg-fadein">
                            <div class="flex gap-3">
                                <div class="flex-shrink-0 w-9 h-9 bg-[#FF6B55] border-2 border-[#1A1A1A] flex items-center justify-center font-extrabold text-xs text-white"
                                    style="font-family: 'Space Grotesk', sans-serif;">AI</div>
                                <div class="px-4 py-3 bg-white border-2 border-[#1A1A1A]">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-3 h-3 text-[#FF6B55] spin-slow flex-shrink-0"
                                            fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4" />
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                                        </svg>
                                        <span class="text-xs text-[#3D3D3D]/50 thinking-text transition-opacity duration-200"
                                            style="font-family: 'Inter', sans-serif;">
                                            Thinking...
                                        </span>
                                    </div>
                                    <div class="flex gap-1.5 items-center">
                                        <div class="w-2 h-2 bg-[#FF6B55] animate-bounce"></div>
                                        <div class="w-2 h-2 bg-[#1A1A1A] animate-bounce" style="animation-delay: 0.15s"></div>
                                        <div class="w-2 h-2 bg-[#FF6B55] animate-bounce" style="animation-delay: 0.3s"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Input Area -->
                    <div class="flex-shrink-0 border-t-2 border-[#1A1A1A] bg-white p-4 sm:p-5">
                        <form wire:submit.prevent="send">
                            <div class="flex gap-3">
                                <input
                                    type="text"
                                    wire:model="message"
                                    wire:keydown.enter="send"
                                    id="chat-input"
                                    placeholder="Ask me anything... (max 500 chars)"
                                    maxlength="500"
                                    class="flex-1 min-w-0 px-4 py-3.5 border-2 border-[#1A1A1A] focus:outline-none focus:border-[#FF6B55] transition-colors duration-150 text-[#1A1A1A] placeholder-[#3D3D3D]/30 bg-[#F5F3EF] text-sm font-medium"
                                    style="font-family: 'Inter', sans-serif;"
                                    autocomplete="off"
                                    {{ $loading ? 'disabled' : '' }}>

                                <button
                                    type="submit"
                                    class="flex-shrink-0 px-5 sm:px-7 py-3.5 bg-[#FF6B55] hover:bg-[#1A1A1A] border-2 border-[#1A1A1A] text-white font-bold transition-all duration-150 disabled:opacity-40 disabled:cursor-not-allowed focus:outline-none send-btn"
                                    style="font-family: 'Space Grotesk', sans-serif;"
                                    {{ $loading ? 'disabled' : '' }}>
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs uppercase tracking-widest hidden sm:inline">Send</span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                        </svg>
                                    </div>
                                </button>
                            </div>

                            @error('message')
                                <p class="text-xs text-red-600 mt-2 bg-red-50 border border-red-200 px-3 py-2" style="font-family: 'Inter', sans-serif;">{{ $message }}</p>
                            @enderror
                            <p class="text-[11px] text-[#3D3D3D]/35 mt-2.5 hidden sm:block"
                                style="font-family: 'Inter', sans-serif;">
                                Press Enter to send &bull; Powered by Gemini &bull; <span x-text="document.getElementById('chat-input')?.value.length || 0"></span>/500
                            </p>
                        </form>
                    </div>

                </div>
            </div><!-- /chat panel -->

        </div><!-- /grid -->
    </div><!-- /container -->


    <script>
        // ── Mobile Tab Switcher ──────────────────────────────────
        function switchTab(tab) {
            const chatPanel = document.getElementById('chat-panel');
            const topicsPanel = document.getElementById('topics-panel');
            const tabChat = document.getElementById('tab-chat');
            const tabTopics = document.getElementById('tab-topics');
            if (!chatPanel || !topicsPanel) return;

            if (tab === 'chat') {
                chatPanel.classList.remove('hidden');
                topicsPanel.classList.add('hidden');
                tabChat.classList.add('bg-[#1A1A1A]', 'text-white');
                tabChat.classList.remove('bg-white', 'text-[#1A1A1A]');
                tabTopics.classList.add('bg-white', 'text-[#1A1A1A]');
                tabTopics.classList.remove('bg-[#1A1A1A]', 'text-white');
            } else {
                topicsPanel.classList.remove('hidden');
                chatPanel.classList.add('hidden');
                tabTopics.classList.add('bg-[#1A1A1A]', 'text-white');
                tabTopics.classList.remove('bg-white', 'text-[#1A1A1A]');
                tabChat.classList.add('bg-white', 'text-[#1A1A1A]');
                tabChat.classList.remove('bg-[#1A1A1A]', 'text-white');
            }
        }

        // ── Thinking phrase cycler ───────────────────────────────
        const thinkingPhrases = [
            'Thinking...',
            'Searching knowledge...',
            'Crafting response...',
            'Almost there...',
        ];
        let phraseIdx = 0,
            phraseTimer = null;

        function startThinkingCycle() {
            phraseIdx = 0;
            phraseTimer = setInterval(() => {
                const el = document.querySelector('.thinking-text');
                if (!el) return clearInterval(phraseTimer);
                el.style.opacity = '0';
                setTimeout(() => {
                    phraseIdx = (phraseIdx + 1) % thinkingPhrases.length;
                    el.textContent = thinkingPhrases[phraseIdx];
                    el.style.opacity = '1';
                }, 220);
            }, 2000);
        }

        function stopThinkingCycle() {
            clearInterval(phraseTimer);
            phraseIdx = 0;
        }

        // ── Scroll helpers ───────────────────────────────────────
        function scrollToBottom() {
            const c = document.getElementById('messages-container');
            if (c) c.scrollTo({
                top: c.scrollHeight,
                behavior: 'smooth'
            });
        }

        // ── Send button press effect ─────────────────────────────
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.querySelector('.send-btn');
            if (btn) {
                btn.addEventListener('mousedown', () => {
                    btn.style.transform = 'translate(3px, 3px)';
                    btn.style.boxShadow = 'none';
                });
                btn.addEventListener('mouseup', () => {
                    btn.style.transform = '';
                    btn.style.boxShadow = '3px 3px 0px 0px #1A1A1A';
                });
                btn.addEventListener('mouseleave', () => {
                    btn.style.transform = '';
                    btn.style.boxShadow = '3px 3px 0px 0px #1A1A1A';
                });
            }
        });

        // ── Livewire hooks ───────────────────────────────────────
        document.addEventListener('livewire:init', () => {
            Livewire.hook('message.sent', () => {
                startThinkingCycle();
                setTimeout(scrollToBottom, 100);
            });
            Livewire.hook('message.processed', () => {
                stopThinkingCycle();
                setTimeout(scrollToBottom, 100);
                const input = document.getElementById('chat-input');
                if (input && !input.disabled) setTimeout(() => input.focus(), 150);
            });
        });
    </script>

    <style>
        /* ── Chat container height ── */
        .chat-container {
            height: 70vh;
            max-height: 640px;
            min-height: 420px;
        }

        @media (min-width: 1024px) {
            .chat-container {
                height: 620px;
            }
        }

        /* ── Message fade-in ── */
        @keyframes msg-fadein {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .msg-fadein {
            animation: msg-fadein 0.24s ease-out both;
        }

        /* ── Thinking text fade ── */
        .thinking-text {
            transition: opacity 0.22s ease;
        }

        /* ── AI status pulse ── */
        @keyframes ai-pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.3;
                transform: scale(0.7);
            }
        }

        .ai-pulse {
            animation: ai-pulse 1.8s ease-in-out infinite;
        }

        /* ── Spinner ── */
        @keyframes spin-slow {
            to {
                transform: rotate(360deg);
            }
        }

        .spin-slow {
            animation: spin-slow 1.2s linear infinite;
        }

        /* ── Custom scrollbar ── */
        .chat-messages::-webkit-scrollbar {
            width: 4px;
        }

        .chat-messages::-webkit-scrollbar-track {
            background: #F5F3EF;
        }

        .chat-messages::-webkit-scrollbar-thumb {
            background: #d0cdc9;
            border-radius: 0;
        }

        .chat-messages::-webkit-scrollbar-thumb:hover {
            background: #FF6B55;
        }

        /* ── No text-select on buttons ── */
        button {
            user-select: none;
            -webkit-user-select: none;
        }

        /* ── Prevent iOS zoom ── */
        @media (max-width: 640px) {
            #chat-input {
                font-size: 16px;
            }
        }
    </style>

</section>