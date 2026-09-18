<div class="bg-[#F5F3EF] min-h-screen relative overflow-hidden">
    <x-site-background />

    <!-- Decorative Elements -->
    <div
        class="absolute top-40 right-10 w-64 h-64 border-8 border-[#FF6B55] rounded-full opacity-5 pointer-events-none transform rotate-12">
    </div>
    <div
        class="absolute bottom-20 left-10 w-40 h-40 border-4 border-[#1A1A1A] opacity-5 pointer-events-none transform -rotate-6">
    </div>

    <div class="max-w-5xl mx-auto px-6 py-20 relative z-10">
        <!-- Back Button -->
        <div class="mb-12">
            <a href="{{ route('projects') }}" wire:navigate
                class="inline-flex items-center gap-2 px-6 py-3 border-2 border-[#1A1A1A] bg-white text-[#1A1A1A] font-black text-sm uppercase tracking-widest hover:bg-[#1A1A1A] hover:text-white transition-all shadow-[4px_4px_0px_0px_#1A1A1A] hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px]"
                style="font-family: 'Space Grotesk', sans-serif;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                BACK TO PROJECTS
            </a>
        </div>

        <!-- Project Hero Card -->
        <article
            class="bg-white border-4 border-[#1A1A1A] rounded-none overflow-hidden shadow-[12px_12px_0px_0px_#1A1A1A]">
            <!-- Project Image Section -->
            <div class="relative h-[400px] md:h-[500px] border-b-4 border-[#1A1A1A] bg-[#F5F3EF] overflow-hidden group">
                @if ($project->image)
                    <img src="{{ image_url($project->image) }}" alt="{{ $project->title }}"
                        class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-500 ease-in-out">
                @else
                    <div class="w-full h-full flex flex-col items-center justify-center bg-gray-100">
                        <svg class="w-32 h-32 text-[#1A1A1A] opacity-10" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif

                <!-- Category Badge -->
                <div class="absolute top-8 left-8 z-20">
                    <div
                        class="bg-[#1A1A1A] text-white px-6 py-2 border-2 border-[#1A1A1A] shadow-[4px_4px_0px_0px_#FF6B55] transform -rotate-2">
                        <span class="text-xs font-black uppercase tracking-widest"
                            style="font-family: 'Space Grotesk', sans-serif;">
                            {{ $project->category }}
                        </span>
                    </div>
                </div>

                <!-- Featured Star if applicable -->
                @if ($project->featured)
                    <div class="absolute top-8 right-8 z-20">
                        <div
                            class="bg-[#FF6B55] text-white p-3 border-2 border-[#1A1A1A] shadow-[4px_4px_0px_0px_#1A1A1A] animate-pulse">
                            <svg class="w-6 h-6 fill-white" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Project Content Section -->
            <div class="p-10 md:p-16">
                <!-- Title & Meta -->
                <div class="mb-12 relative">
                    <h1 class="text-4xl md:text-6xl font-black text-[#1A1A1A] mb-4 leading-tight uppercase"
                        style="font-family: 'Space Grotesk', sans-serif;">
                        {{ $project->title }}
                    </h1>
                    <div class="h-2 w-32 bg-[#FF6B55] border-2 border-[#1A1A1A]"></div>
                </div>

                <!-- Description -->
                <div class="prose prose-xl max-w-none text-[#3D3D3D] font-medium leading-relaxed mb-16"
                    style="font-family: 'Inter', sans-serif;">
                    {!! nl2br(e($project->description)) !!}
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-6">
                    @if ($project->demo_link)
                        <a href="{{ $project->demo_link }}" target="_blank"
                            class="flex-1 flex items-center justify-center gap-4 px-8 py-5 border-4 border-[#1A1A1A] bg-[#FF6B55] text-white font-black text-lg uppercase tracking-widest hover:bg-[#1A1A1A] transition-all shadow-[8px_8px_0px_0px_#1A1A1A] hover:shadow-none hover:translate-x-[4px] hover:translate-y-[4px]"
                            style="font-family: 'Space Grotesk', sans-serif;">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            LAUNCH LIVE SITE
                        </a>
                    @endif

                    @if ($project->github_link)
                        <a href="{{ $project->github_link }}" target="_blank"
                            class="flex-1 flex items-center justify-center gap-4 px-8 py-5 border-4 border-[#1A1A1A] bg-white text-[#1A1A1A] font-black text-lg uppercase tracking-widest hover:bg-[#1A1A1A] hover:text-white transition-all shadow-[8px_8px_0px_0px_#1A1A1A] hover:shadow-none hover:translate-x-[4px] hover:translate-y-[4px]"
                            style="font-family: 'Space Grotesk', sans-serif;">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                            </svg>
                            VIEW SOURCE CODE
                        </a>
                    @endif
                </div>
            </div>
        </article>

        <!-- Dynamic Decorative Badge -->
        <div class="mt-20 flex justify-center">
            <div
                class="inline-block px-10 py-4 bg-[#FF6B55] border-4 border-[#1A1A1A] rounded-full shadow-[6px_6px_0px_0px_#1A1A1A] transform -rotate-1">
                <p class="text-white font-black uppercase tracking-tighter"
                    style="font-family: 'Space Grotesk', sans-serif;">
                    Built with Passion • Designed for Purpose
                </p>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700;800&family=Inter:wght@400;500;700&display=swap"
        rel="stylesheet">
    <style>
        .prose xl {
            font-size: 1.25rem;
            line-height: 1.75;
        }
    </style>
@endpush