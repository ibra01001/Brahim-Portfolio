<!-- AI Chat Section — Neo-Brutalist (matches Home Page) -->
<section class="relative w-full overflow-hidden py-8 sm:py-12">

    <div class="w-full max-w-7xl mx-auto px-6 relative z-10">

        <!-- Section Header -->
        <div class="mb-8 sm:mb-10">


            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h2 class="text-4xl sm:text-5xl md:text-5xl font-black text-[#1A1A1A] leading-[1.05] tracking-tight"
                        style="font-family: 'Space Grotesk', sans-serif;">
                        Ask me <span class="relative inline-block text-[#FF6B55]">
                            anything.
                            <svg width="100%" height="10" viewBox="0 0 240 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="absolute -bottom-1 left-0 w-full pointer-events-none"
                                preserveAspectRatio="none">
                                <path d="M2 7C45 2.5 90 8.5 135 4C180 -0.5 210 7.5 238 5"
                                    stroke="#FF6B55" stroke-width="3" stroke-linecap="round" fill="none" opacity="0.95" />
                            </svg>
                        </span>
                    </h2>
                    <p class="mt-4 text-base sm:text-lg text-[#3D3D3D] max-w-xl leading-relaxed font-medium"
                        style="font-family: 'Inter', sans-serif;">
                        Got questions about Ibrahim's stack, projects, or experience? Ask his AI assistant for instant answers.
                    </p>
                </div>
            </div>
        </div>

        <!-- Mobile Horizontal Topic Ribbon -->
        <div class="flex lg:hidden mb-4 -mx-1 px-1 overflow-x-auto gap-2.5 pb-3 scrollbar-none">
            <span class="flex-shrink-0 text-xs font-black uppercase tracking-widest text-[#1A1A1A] flex items-center gap-1.5 self-center mr-1"
                style="font-family: 'Space Grotesk', sans-serif;">
                <svg class="w-3.5 h-3.5 text-[#FF6B55]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                Ideas:
            </span>
            @foreach([
                'What are your main skills?' => '',
                'Tell me about your projects' => '',
                'How can I get in touch?' => '',
                'What is your preferred stack?' => '',
            ] as $suggestion => $unused)
            <button
                type="button"
                wire:click="$set('message', '{{ $suggestion }}')"
                class="flex-shrink-0 text-xs font-bold px-3.5 py-2 bg-white text-[#1A1A1A] border-2 border-[#1A1A1A] rounded-md shadow-[2px_2px_0px_0px_#1A1A1A] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px] hover:bg-[#FF6B55] hover:text-white hover:border-[#1A1A1A] active:translate-x-[1px] active:translate-y-[1px] transition-all"
                style="font-family: 'Space Grotesk', sans-serif;"
                {{ $loading ? 'disabled' : '' }}>
                {{ $suggestion }}
            </button>
            @endforeach
        </div>

        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">

            <!-- LEFT SIDEBAR — Desktop only -->
            <div class="hidden lg:flex lg:col-span-4 flex-col gap-6">

                <!-- Quick Topics Card -->
                <div class="bg-white border-2 border-[#1A1A1A] p-6 rounded-lg shadow-[4px_4px_0px_0px_#1A1A1A] relative overflow-hidden">
                    <!-- subtle decorative corner -->
                    <div class="absolute -top-6 -right-6 w-16 h-16 bg-[#FF6B55] opacity-[0.07] rounded-full pointer-events-none"></div>

                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-9 h-9 rounded-md bg-[#FF6B55] border-2 border-[#1A1A1A] flex items-center justify-center text-white flex-shrink-0 shadow-[2px_2px_0px_0px_#1A1A1A]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-black text-[#1A1A1A] text-xs uppercase tracking-[0.16em]"
                                style="font-family: 'Space Grotesk', sans-serif;">
                                Suggested Prompts
                            </h3>
                            <p class="text-[11px] text-[#3D3D3D] font-medium" style="font-family: 'Inter', sans-serif;">Click any topic to prefill</p>
                        </div>
                    </div>

                    <div class="space-y-2.5">
                        @php
                            $neoPills = [
                                'What are your core skills?',
                                'Tell me about your featured projects',
                                'What is your background & experience?',
                                'How can I contact or hire you?',
                            ];
                        @endphp

                        @foreach($neoPills as $suggestion)
                        <button
                            type="button"
                            wire:click="$set('message', '{{ $suggestion }}')"
                            class="w-full flex items-center justify-between gap-3 px-4 py-3 bg-[#F5F3EF] border-2 border-[#1A1A1A] text-[#1A1A1A] hover:bg-[#FF6B55] hover:text-white hover:border-[#1A1A1A] font-bold transition-all duration-150 text-[13px] text-left group rounded-md shadow-[2px_2px_0px_0px_#1A1A1A] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px]"
                            style="font-family: 'Space Grotesk', sans-serif;"
                            {{ $loading ? 'disabled' : '' }}>
                            <span class="leading-snug">{{ $suggestion }}</span>
                            <span class="w-7 h-7 rounded-md bg-white border-2 border-[#1A1A1A] group-hover:bg-white group-hover:border-[#1A1A1A] flex items-center justify-center flex-shrink-0 transition-colors shadow-[1px_1px_0px_0px_#1A1A1A] group-hover:shadow-none">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-3 w-3 text-[#1A1A1A] group-hover:text-[#FF6B55] transition-colors"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                        </button>
                        @endforeach
                    </div>
                </div>

               

            </div>

            <!-- CHAT PANEL -->
            <div id="chat-panel" class="w-full lg:col-span-8 col-span-1">
                <div class="w-full bg-white border-2 border-[#1A1A1A] rounded-lg shadow-[6px_6px_0px_0px_#1A1A1A] sm:shadow-[8px_8px_0px_0px_#1A1A1A] overflow-hidden flex flex-col chat-container">

                    <!-- Chat Header -->
                    <div class="bg-[#1A1A1A] px-4 sm:px-6 py-4 flex-shrink-0 border-b-2 border-[#1A1A1A] relative">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3 sm:gap-3.5 min-w-0">
                                <!-- Avatar -->
                                <div class="w-10 h-10 sm:w-11 sm:h-11 bg-white border-2 border-white rounded-md flex items-center justify-center p-1.5 flex-shrink-0 shadow-[2px_2px_0px_0px_rgba(255,255,255,0.15)]">
                                    <x-robot-icon class="w-full h-full" />
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2">
                                        <h3 class="font-black text-white text-sm sm:text-base tracking-tight uppercase"
                                            style="font-family: 'Space Grotesk', sans-serif;">
                                            Ibrahim's Assistant
                                        </h3>
                                        <span class="hidden sm:inline-flex px-2 py-0.5 bg-[#FF6B55] text-white text-[10px] font-black rounded-md border border-white/20 uppercase tracking-wider"
                                            style="font-family: 'Space Grotesk', sans-serif;">
                                            Bot
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-1.5 mt-0.5">
                                        <div class="w-1.5 h-1.5 rounded-full bg-emerald-400 ai-soft-pulse flex-shrink-0 shadow-sm"></div>
                                        <p class="text-[11px] font-bold uppercase tracking-widest text-white/60"
                                            style="font-family: 'Space Grotesk', sans-serif;">
                                            Online • Instant answers
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Clear Chat Action -->
                            <button
                                wire:click="clearChat"
                                title="Reset conversation"
                                class="flex-shrink-0 flex items-center gap-1.5 px-3.5 py-2 bg-white hover:bg-[#FF6B55] hover:text-white text-[#1A1A1A] rounded-md border-2 border-[#1A1A1A] shadow-[2px_2px_0px_0px_rgba(255,255,255,0.2)] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px] transition-all text-xs font-black uppercase tracking-wider"
                                style="font-family: 'Space Grotesk', sans-serif;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                <span class="hidden sm:inline">Reset</span>
                            </button>
                        </div>
                    </div>

                    <!-- Messages Viewport -->
                    <div
                        class="flex-1 overflow-y-auto p-4 sm:p-6 space-y-4 sm:space-y-5 bg-[#F5F3EF] chat-messages"
                        id="messages-container">

                        @forelse($conversation as $index => $msg)
                        <div class="flex {{ $msg['role'] === 'user' ? 'justify-end' : 'justify-start' }} msg-fadein">
                            <div class="flex gap-2.5 sm:gap-3 max-w-[90%] sm:max-w-[78%] {{ $msg['role'] === 'user' ? 'flex-row-reverse' : 'flex-row' }}">

                                @if($msg['role'] === 'user')
                                    <div class="flex-shrink-0 w-8 h-8 sm:w-9 sm:h-9 flex items-center justify-center font-black text-[11px] border-2 border-[#1A1A1A] shadow-[2px_2px_0px_0px_#1A1A1A] rounded-md bg-[#1A1A1A] text-white"
                                        style="font-family: 'Space Grotesk', sans-serif;">
                                        YOU
                                    </div>
                                @else
                                    <div class="flex-shrink-0 w-8 h-8 sm:w-9 sm:h-9 flex items-center justify-center p-1 border-2 border-[#1A1A1A] shadow-[2px_2px_0px_0px_#1A1A1A] rounded-md bg-white">
                                        <x-robot-icon class="w-full h-full" />
                                    </div>
                                @endif

                                <!-- Bubble -->
                                <div class="flex flex-col {{ $msg['role'] === 'user' ? 'items-end' : 'items-start' }} min-w-0">
                                    <div class="px-4 py-3 sm:px-5 sm:py-3.5 border-2 border-[#1A1A1A] rounded-lg shadow-[3px_3px_0px_0px_#1A1A1A] transition-all
                                        {{ $msg['role'] === 'user'
                                            ? 'bg-[#FF6B55] text-white'
                                            : 'bg-white text-[#1A1A1A]' }}">
                                        <p class="text-[13.5px] sm:text-[14px] leading-relaxed whitespace-pre-wrap break-words font-medium"
                                            style="font-family: 'Inter', sans-serif;">
                                            {{ $msg['content'] }}
                                        </p>
                                    </div>
                                    <span class="text-[10px] font-bold uppercase tracking-widest text-[#3D3D3D]/70 mt-1.5 px-1"
                                        style="font-family: 'Space Grotesk', sans-serif;">
                                        {{ $msg['timestamp'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @empty

                        <!-- Empty State -->
                        <div class="flex flex-col items-center justify-center h-full text-center py-10 px-4 sm:px-6">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white border-2 border-[#1A1A1A] rounded-lg flex items-center justify-center mb-5 p-2.5 shadow-[4px_4px_0px_0px_#1A1A1A] hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none transition-all">
                                <x-robot-icon class="w-full h-full" />
                            </div>

                            <h3 class="text-xl sm:text-2xl font-black text-[#1A1A1A] mb-2 tracking-tight uppercase"
                                style="font-family: 'Space Grotesk', sans-serif;">
                                Say hello!
                            </h3>
                            <p class="text-[#3D3D3D] text-xs sm:text-sm max-w-sm leading-relaxed font-medium"
                                style="font-family: 'Inter', sans-serif;">
                                Ask about Ibrahim's full-stack applications, skills, work philosophy, or how to get in touch.
                            </p>

                            <!-- Starter Chips -->
                            <div class="mt-6 flex gap-2 flex-wrap justify-center max-w-md">
                                @php
                                    $starterChips = [
                                        '🚀 Skills & Stack',
                                        '💼 Featured Works',
                                        '📫 Contact Details',
                                    ];
                                @endphp
                                @foreach($starterChips as $label)
                                <button
                                    type="button"
                                    wire:click="$set('message', '{{ str_replace(['🚀 ', '💼 ', '📫 '], '', $label) }}')"
                                    class="px-3.5 py-2 bg-white border-2 border-[#1A1A1A] text-[#1A1A1A] text-xs font-black uppercase tracking-wide hover:bg-[#FF6B55] hover:text-white active:translate-x-[1px] active:translate-y-[1px] transition-all shadow-[2px_2px_0px_0px_#1A1A1A] hover:shadow-none rounded-md"
                                    style="font-family: 'Space Grotesk', sans-serif;">
                                    {{ $label }}
                                </button>
                                @endforeach
                            </div>
                        </div>

                        @endforelse

                        <!-- Typing indicator -->
                        @if($loading)
                        <div class="flex justify-start msg-fadein">
                            <div class="flex gap-2.5 sm:gap-3">
                                <div class="flex-shrink-0 w-8 h-8 sm:w-9 sm:h-9 bg-white border-2 border-[#1A1A1A] rounded-md flex items-center justify-center p-1 shadow-[2px_2px_0px_0px_#1A1A1A]">
                                    <x-robot-icon class="w-full h-full" />
                                </div>
                                <div class="px-4 py-3 bg-white border-2 border-[#1A1A1A] rounded-lg shadow-[3px_3px_0px_0px_#1A1A1A]">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-3 h-3 text-[#FF6B55] spin-slow flex-shrink-0"
                                            fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4" />
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                                        </svg>
                                        <span class="text-xs font-bold uppercase tracking-widest text-[#1A1A1A] thinking-text transition-opacity duration-200"
                                            style="font-family: 'Space Grotesk', sans-serif;">
                                            Thinking...
                                        </span>
                                    </div>
                                    <div class="flex gap-1.5 items-center">
                                        <div class="w-2 h-2 rounded-full bg-[#FF6B55] border border-[#1A1A1A] animate-bounce"></div>
                                        <div class="w-2 h-2 rounded-full bg-[#1A1A1A] animate-bounce" style="animation-delay: 0.15s"></div>
                                        <div class="w-2 h-2 rounded-full bg-[#FF6B55] border border-[#1A1A1A] animate-bounce" style="animation-delay: 0.3s"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Input Area -->
                    <div class="flex-shrink-0 bg-white p-3 sm:p-4 border-t-2 border-[#1A1A1A]">
                        <form wire:submit.prevent="send">
                            <div class="flex items-center gap-2 sm:gap-2.5 bg-[#F5F3EF] border-2 border-[#1A1A1A] focus-within:border-[#FF6B55] focus-within:bg-white rounded-md p-1.5 sm:p-2 transition-all shadow-[2px_2px_0px_0px_#1A1A1A] focus-within:shadow-[3px_3px_0px_0px_#1A1A1A]">

                                <input
                                    type="text"
                                    wire:model="message"
                                    wire:keydown.enter="send"
                                    id="chat-input"
                                    placeholder="Ask about skills, projects, experience..."
                                    maxlength="500"
                                    class="flex-1 min-w-0 px-3.5 sm:px-4 py-2.5 bg-transparent text-[#1A1A1A] placeholder-[#3D3D3D]/60 border-0 outline-none focus:outline-none focus:ring-0 focus:border-0 text-[15px] sm:text-sm font-medium"
                                    style="font-family: 'Inter', sans-serif;"
                                    autocomplete="off"
                                    {{ $loading ? 'disabled' : '' }}>

                                <!-- Send Button -->
                                <button
                                    type="submit"
                                    class="flex-shrink-0 px-4 sm:px-5 py-2.5 bg-[#FF6B55] hover:bg-[#1A1A1A] active:translate-x-[1px] active:translate-y-[1px] text-white font-black rounded-md border-2 border-[#1A1A1A] shadow-[2px_2px_0px_0px_#1A1A1A] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px] transition-all duration-150 disabled:opacity-40 disabled:cursor-not-allowed focus:outline-none flex items-center justify-center gap-1.5"
                                    style="font-family: 'Space Grotesk', sans-serif;"
                                    {{ $loading ? 'disabled' : '' }}>
                                    <span class="text-xs uppercase tracking-widest hidden sm:inline">Send</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                    </svg>
                                </button>
                            </div>

                            @error('message')
                                <p class="text-xs font-bold text-red-700 mt-2 bg-red-50 border-2 border-red-200 rounded-md px-3 py-1.5" style="font-family: 'Space Grotesk', sans-serif;">{{ $message }}</p>
                            @enderror

                            <div class="flex items-center justify-between text-[11px] font-bold uppercase tracking-widest text-[#3D3D3D]/70 mt-2 px-1">
                                <span class="hidden sm:inline" style="font-family: 'Space Grotesk', sans-serif;">
                                    Press Enter to send • Powered by Gemini
                                </span>
                                <span class="sm:hidden text-[10px]" style="font-family: 'Space Grotesk', sans-serif;">
                                    Powered by Gemini 2.5
                                </span>
                                <span class="text-[10.5px] font-mono text-[#3D3D3D]/60 normal-case tracking-normal" x-text="document.getElementById('chat-input')?.value.length || 0">0</span>
                            </div>
                        </form>
                    </div>

                </div>
            </div><!-- /chat panel -->

        </div><!-- /grid -->
    </div><!-- /container -->


    <script>
        // ── Thinking phrase cycler ───────────────────────────────
        const thinkingPhrases = [
            'Thinking...',
            'Searching portfolio context...',
            'Crafting answer...',
            'Finishing up...',
        ];
        let phraseIdx = 0,
            phraseTimer = null;

        function startThinkingCycle() {
            phraseIdx = 0;
            if (phraseTimer) clearInterval(phraseTimer);
            phraseTimer = setInterval(() => {
                const el = document.querySelector('.thinking-text');
                if (!el) return clearInterval(phraseTimer);
                el.style.opacity = '0';
                setTimeout(() => {
                    phraseIdx = (phraseIdx + 1) % thinkingPhrases.length;
                    el.textContent = thinkingPhrases[phraseIdx];
                    el.style.opacity = '1';
                }, 200);
            }, 1800);
        }

        function stopThinkingCycle() {
            if (phraseTimer) clearInterval(phraseTimer);
            phraseIdx = 0;
        }

        // ── Scroll helpers ───────────────────────────────────────
        function scrollToBottom() {
            const c = document.getElementById('messages-container');
            if (c) {
                c.scrollTo({
                    top: c.scrollHeight,
                    behavior: 'smooth'
                });
            }
        }

        // ── Livewire hooks ───────────────────────────────────────
        document.addEventListener('livewire:init', () => {
            Livewire.hook('message.sent', () => {
                startThinkingCycle();
                setTimeout(scrollToBottom, 50);
            });
            Livewire.hook('message.processed', () => {
                stopThinkingCycle();
                setTimeout(scrollToBottom, 80);
                const input = document.getElementById('chat-input');
                if (input && !input.disabled && window.innerWidth >= 768) {
                    setTimeout(() => input.focus(), 150);
                }
            });
        });
    </script>

    <style>
        /* ── Chat container height & responsive fluidity ── */
        .chat-container {
            height: 74vh;
            max-height: 680px;
            min-height: 480px;
        }

        @media (min-width: 1024px) {
            .chat-container {
                height: 620px;
            }
        }

        /* ── Message fade-in animation ── */
        @keyframes msg-fadein {
            from {
                opacity: 0;
                transform: translateY(6px) scale(0.99);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .msg-fadein {
            animation: msg-fadein 0.22s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        /* ── Soft Breathing Pulse ── */
        @keyframes ai-soft-pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.45;
                transform: scale(0.85);
            }
        }

        .ai-soft-pulse {
            animation: ai-soft-pulse 2.2s ease-in-out infinite;
        }

        /* ── Smooth spinner ── */
        @keyframes spin-slow {
            to {
                transform: rotate(360deg);
            }
        }

        .spin-slow {
            animation: spin-slow 1.1s linear infinite;
        }

        /* ── Custom hard scrollbar (home style) ── */
        .chat-messages::-webkit-scrollbar {
            width: 8px;
        }

        .chat-messages::-webkit-scrollbar-track {
            background: #F5F3EF;
        }

        .chat-messages::-webkit-scrollbar-thumb {
            background: #1A1A1A;
            border-radius: 0;
            border: 1px solid #F5F3EF;
        }

        .chat-messages::-webkit-scrollbar-thumb:hover {
            background: #FF6B55;
        }

        /* ── Hide scrollbar for horizontal chips ── */
        .scrollbar-none::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-none {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* ── Input no-border guarantees ── */
        #chat-input,
        #chat-input:focus,
        #chat-input:hover {
            border: 0 !important;
            border-width: 0 !important;
            outline: none !important;
            box-shadow: none !important;
            --tw-ring-shadow: none !important;
            --tw-ring-offset-shadow: none !important;
        }

        /* ── Prevent iOS zoom on input focus ── */
        @media (max-width: 640px) {
            #chat-input {
                font-size: 16px;
            }
        }
    </style>

</section>
