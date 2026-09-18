<div class="bg-[#F5F3EF] min-h-screen relative overflow-hidden">
    <x-site-background />

    <!-- Decorative Top Left Shape -->
    <div
        class="absolute top-20 left-10 w-32 h-32 border-4 border-[#FF6B55] rounded-full opacity-10 pointer-events-none">
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-28 relative">
            <h2 class="text-5xl md:text-6xl font-black text-[#1A1A1A] mb-6 inline-block relative"
                style="font-family: 'Space Grotesk', sans-serif;">
                PROJECTS
                <!-- Hand-drawn sharp accent -->
                <svg class="absolute w-full h-3 -bottom-2 left-0 text-[#FF6B55]" viewBox="0 0 100 10"
                    preserveAspectRatio="none">
                    <path d="M0 5 L 20 2 L 40 8 L 60 2 L 80 8 L 100 5" stroke="currentColor" stroke-width="4"
                        fill="none" />
                </svg>
            </h2>
            <p class="text-xl text-[#3D3D3D] max-w-2xl mx-auto mt-8 font-bold uppercase tracking-tight"
                style="font-family: 'Space Grotesk', sans-serif;">
                A collection of work built with code and purpose.
            </p>
        </div>

        <!-- Projects Sections -->
        @php
            $categoryOrder = ['real life project', 'personal project'];
            $categoryLabels = [
                'real life project' => 'Real-Life Projects',
                'personal project' => 'Personal Projects'
            ];
        @endphp

        <div class="space-y-40 ">
            @foreach ($categoryOrder as $categoryKey)
                @if(isset($groupedProjects[$categoryKey]) && $groupedProjects[$categoryKey]->count() > 0)
                    <section>
                        <!-- Category Header -->
                        <div class="flex items-center gap-6 mb-16 px-4">
                            <div
                                class="bg-[#1A1A1A] text-white px-8 py-3 rounded-md transform -rotate-1 border-2 border-[#1A1A1A] shadow-[4px_4px_0px_0px_#FF6B55]">
                                <h3 class="text-2xl font-black font-space-grotesk tracking-widest uppercase">
                                    {{ $categoryLabels[$categoryKey] }}
                                </h3>
                            </div>
                            <div class="h-0.5 bg-[#1A1A1A] flex-grow opacity-20 border-t-2 border-dashed border-[#1A1A1A]">
                            </div>
                        </div>

                        <!-- Projects Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12 ">
                            @foreach ($groupedProjects[$categoryKey] as $project)
                                <article
                                    class="group relative bg-white border-2 border-[#1A1A1A] rounded-md overflow-hidden transition-all duration-200 hover:-translate-x-1 hover:-translate-y-1 hover:shadow-[8px_8px_0px_0px_#1A1A1A]"
                                    style="box-shadow: 4px 4px 0px 0px #1A1A1A;">

                                    <!-- Featured Badge (SVG Star) -->
                                    @if ($project->featured)
                                        <div class="absolute top-4 right-4 z-20 transform rotate-12">
                                            <div
                                                class="bg-[#FF6B55] text-white p-2 border-2 border-[#1A1A1A] flex items-center gap-1 shadow-[2px_2px_0px_0px_#1A1A1A]">
                                                <svg class="w-4 h-4 fill-white" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                                </svg>
                                                <span class="text-[10px] font-black uppercase tracking-tighter"
                                                    style="font-family: 'Space Grotesk', sans-serif;">FEATURED</span>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Project Thumbnail -->
                                    <div
                                        class="relative h-60 border-b-2 border-[#1A1A1A] bg-[#F5F3EF] overflow-hidden group-hover:bg-[#FF6B55]/10 transition-colors">
                                        @if ($project->image)
                                            <img src="{{ image_url($project->image) }}" alt="{{ $project->title }}"
                                                class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-300"
                                                loading="lazy">
                                        @else
                                            <div class="w-full h-full flex flex-col items-center justify-center relative">
                                                <svg class="w-16 h-16 text-[#1A1A1A] opacity-20" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Content -->
                                    <div class="p-6 lg:p-8 bg-white relative z-10 flex flex-col h-[calc(100%-15rem)]">
                                        <h4 class="text-xl lg:text-2xl font-black text-[#1A1A1A] mb-3 lg:mb-4 leading-none uppercase tracking-tight group-hover:text-[#FF6B55] transition-colors"
                                            style="font-family: 'Space Grotesk', sans-serif;">
                                            {{ $project->title }}
                                        </h4>

                                        <p class="text-[#3D3D3D] mb-8 line-clamp-3 text-sm font-medium leading-relaxed"
                                            style="font-family: 'Inter', sans-serif;">
                                            {{ $project->description }}
                                        </p>

                                        <!-- Actions -->
                                        <div class="flex items-center gap-4 mt-auto">
                                            @if (!empty($project->demo_link))
                                                <a href="{{ $project->demo_link }}" target="_blank"
                                                    class="flex-1 flex items-center justify-center gap-2 px-4 py-3 border-2 border-[#1A1A1A] bg-[#FF6B55] text-white font-black text-xs uppercase tracking-widest hover:bg-[#1A1A1A] transition-all shadow-[2px_2px_0px_0px_#1A1A1A] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px]"
                                                    style="font-family: 'Space Grotesk', sans-serif;">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                    </svg>
                                                    LIVE
                                                </a>
                                            @endif


                                            @if (!empty($project->github_link))
                                                <a href="{{ $project->github_link }}" target="_blank"
                                                    class="flex-1 flex items-center justify-center gap-2 px-4 py-3 border-2 border-[#1A1A1A] bg-white text-[#1A1A1A] font-black text-xs uppercase tracking-widest hover:bg-[#1A1A1A] hover:text-white transition-all shadow-[2px_2px_0px_0px_#1A1A1A] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px]"
                                                    style="font-family: 'Space Grotesk', sans-serif;">
                                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                                    </svg>
                                                    CODE
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endif
            @endforeach

            @if($groupedProjects->isEmpty())
                <div class="col-span-full text-center py-32 border-4 border-dashed border-[#1A1A1A] opacity-30">
                    <div class="inline-block relative">
                        <svg class="w-32 h-32 text-[#1A1A1A] mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="mt-8 text-3xl font-black text-[#1A1A1A] uppercase tracking-tighter"
                        style="font-family: 'Space Grotesk', sans-serif;">
                        STILL ARCHIVING...
                    </h3>
                    <p class="mt-4 text-[#3D3D3D] font-bold uppercase text-sm tracking-widest">New things are under
                        construction.</p>
                </div>
            @endif
        </div>
    </div>
</div>

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700;800&family=Inter:wght@400;500;700&display=swap"
        rel="stylesheet">
@endpush