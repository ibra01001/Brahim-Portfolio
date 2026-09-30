<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remili Mohamed | Portfolio</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700;800&family=Inter:wght@400;500;700&family=Kalam:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F5F3EF;
            color: #1A1A1A;
            scroll-behavior: smooth;
        }

        .font-space {
            font-family: 'Space Grotesk', sans-serif;
        }

        .font-hand {
            font-family: 'Kalam', cursive;
        }

        .neo-border {
            border: 3px solid #1A1A1A;
            box-shadow: 6px 6px 0px 0px #1A1A1A;
        }

        .neo-border-small {
            border: 2px solid #1A1A1A;
            box-shadow: 4px 4px 0px 0px #1A1A1A;
        }

        .sketchy-border {
            border: 3px solid #1A1A1A;
            border-radius: 255px 15px 225px 15px/15px 225px 15px 255px;
        }

        .neo-button {
            transition: all 0.2s;
        }

        .neo-button:hover {
            transform: translate(-2px, -2px);
            box-shadow: 8px 8px 0px 0px #1A1A1A;
        }

        .neo-button:active {
            transform: translate(2px, 2px);
            box-shadow: 3px 3px 0px 0px #1A1A1A;
        }

        .rotate-sketch {
            transform: rotate(-1.5deg);
        }

        .rotate-sketch-alt {
            transform: rotate(1.2deg);
        }

        /* Subtle paper texture */
        .paper-bg {
            background-image: url("https://www.transparenttextures.com/patterns/natural-paper.png");
        }
    </style>
</head>

<body class="selection:bg-[#FF6B55] selection:text-white paper-bg">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-[#F5F3EF]/90 backdrop-blur-sm border-b-2 border-black/10 py-4">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <a href="#" class="text-2xl font-black font-space tracking-tighter group">
                IBRAHIM<span class="text-[#FF6B55] group-hover:animate-ping">.</span>
            </a>
            <div class="hidden md:flex space-x-8 font-bold font-space text-sm uppercase">
                <a href="#about" class="hover:text-[#FF6B55] transition-colors relative group">
                    About
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#FF6B55] transition-all group-hover:w-full"></span>
                </a>
                <a href="#skills" class="hover:text-[#FF6B55] transition-colors relative group">
                    Skills
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#FF6B55] transition-all group-hover:w-full"></span>
                </a>
                <a href="#projects" class="hover:text-[#FF6B55] transition-colors relative group">
                    Projects
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#FF6B55] transition-all group-hover:w-full"></span>
                </a>
                <a href="#contact" class="hover:text-[#FF6B55] transition-colors relative group">
                    Contact
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#FF6B55] transition-all group-hover:w-full"></span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="profile" class="max-w-7xl mx-auto px-6 py-20 lg:py-32 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center overflow-hidden">
        <div class="space-y-8 text-center lg:text-left relative">
            <!-- Sketchy Arrow -->
            <svg class="absolute -top-16 -left-8 w-24 h-auto text-[#FF6B55] opacity-40 hidden lg:block rotate-[-20deg]" viewBox="0 0 133.13 60.06">
                <path fill="currentColor" d="M-1382.25,1768.26a57.31,57.31,0,0,0-7-9.22c-2.53-2.79-5.26-5.41-8-8.09a1,1,0,0,1,0-1.35,54,54,0,0,1,6.08-4.42c-2.9-4.67-5.94-9.33-9-13.87a69,69,0,0,0-10.53-12.46,35.1,35.1,0,0,0-6.53-4.68,31.21,31.21,0,0,0-7.46-2.9,44.61,44.61,0,0,0-16.14-.51c-7.41,1-14.69,3.09-22,5a131.06,131.06,0,0,0-21.26,7.41,63.88,63.88,0,0,0-9.65,5.61,48.92,48.92,0,0,0-8.2,7.48,39.86,39.86,0,0,0-6,9.28,30.59,30.59,0,0,0-2.75,10.66.55.55,0,0,1-1.1-.06,31.11,31.11,0,0,1,2.6-11.15,40.12,40.12,0,0,1,6.1-9.73,49.48,49.48,0,0,1,8.41-7.82,64.14,64.14,0,0,1,9.89-5.8,129.66,129.66,0,0,1,21.54-7.51c7.32-2,14.64-4,22.23-5.09a46.89,46.89,0,0,1,16.78.46,32.59,32.59,0,0,1,7.92,3,37.26,37.26,0,0,1,6.93,4.87,69.66,69.66,0,0,1,10.89,12.77c1.59,2.29,3.11,4.62,4.62,6.94s3,4.68,4.43,7.07a29.29,29.29,0,0,1,6.59-2.7l0-.07c-.39-.6.43-1.29.9-.73.15.18.27.37.41.55a1,1,0,0,1,.74,1.12c1.77,3.1,2.13,6.91,2.18,10.43a49.62,49.62,0,0,1-1.88,15.23A.91.91,0,0,1-1382.25,1768.26Zm-6.22-22.13a65.51,65.51,0,0,1,7.14,16.81,56.07,56.07,0,0,0,.83-8.59c.08-3.76,0-7.56-1.52-11A63.35,63.35,0,0,0-1388.47,1746.13Zm-1.68.9a40.83,40.83,0,0,0-5,3.29c4.55,4.47,9,8.85,12.76,14.3A66.91,66.91,0,0,0-1390.15,1747Z" transform="translate(1511.93 -1708.56)"></path>
            </svg>

            <div class="relative inline-block">
                <h1 class="text-6xl md:text-8xl font-black font-space leading-none uppercase">
                    HI, I'M <br>
                    <span class="relative">
                        IBRAHIM
                        <!-- Hand-drawn underline -->
                        <svg class="absolute -bottom-2 md:-bottom-4 left-0 w-full h-auto text-[#FF6B55]" viewBox="0 0 567 25">
                            <path fill="currentColor" d="M385.23 0.827769C381.154 0.817409 377.874 0.809073 375.89 0.805794C375.175 0.805794 374.486 0.818413 373.843 0.830179C373.04 0.844866 372.31 0.858226 371.694 0.844061C354.001 0.746669 335.311 0.757717 316.588 0.768785C305.883 0.775113 295.167 0.781448 284.62 0.767528C279.056 0.758253 273.484 0.802926 267.911 0.847614C265.85 0.864145 263.788 0.880677 261.726 0.894482C256.712 0.808007 251.739 0.876174 246.784 0.944104C244.503 0.97538 242.225 1.00661 239.948 1.02267C220.37 1.15495 200.75 1.14725 181.134 1.13955C174.268 1.13685 167.404 1.13416 160.541 1.13747C147.268 1.14532 133.993 1.14834 120.718 1.15136C90.8462 1.15815 60.9724 1.16495 31.1048 1.22677C28.9162 1.22995 26.7316 1.20306 24.5533 1.17626C17.9839 1.09542 11.4719 1.01529 5.0823 1.7625C5.0249 1.76888 4.9388 1.77526 4.8527 1.78164C4.7666 1.78802 4.6805 1.79439 4.6231 1.80077C2.73516 1.96382 2.56182 2.23656 2.39035 2.50636C2.30693 2.63761 2.22396 2.76816 1.94426 2.88505C-1.94636 4.54335 1.12789 5.06634 12.7232 4.82397C14.8496 4.78101 17.0845 4.82847 19.2757 4.875C19.6872 4.88373 20.0971 4.89244 20.5044 4.9005C25.4506 5.00619 33.1988 5.03307 39.1422 5.0537C40.3724 5.05796 41.5252 5.06196 42.5598 5.06634C46.2631 5.0858 50.1544 5.02612 53.9586 4.96777C57.6367 4.91136 61.2335 4.85619 64.5004 4.87501C75.6808 4.9356 86.8592 5.03419 98.0371 5.13277C115.095 5.28321 132.152 5.43364 149.214 5.44905C168.008 5.47103 186.803 5.37937 205.599 5.2877C219.526 5.21979 233.455 5.15186 247.385 5.13014C264.81 5.10463 282.235 5.11739 299.66 5.13014C317.085 5.1429 334.51 5.15566 351.934 5.13014C364.488 5.11364 377.04 5.1265 389.594 5.13936C415.843 5.16626 442.096 5.19316 468.372 4.95154C487.993 4.77248 507.76 4.92762 527.509 5.0826C534.491 5.13741 541.472 5.19219 548.443 5.23218C559.464 5.29596 566.659 4.42854 566.888 2.92332C567.09 1.57903 557.762 1.47732 551.372 1.40763C550.91 1.40259 550.464 1.39772 550.037 1.39257C509.587 0.907833 469.023 0.882341 428.471 0.895097C415.449 0.904574 397.013 0.857716 385.23 0.827769ZM269.511 19.7243C260.692 19.7442 251.853 19.7642 248.584 19.7727L248.413 19.777C247.458 19.801 246.58 19.823 245.918 19.811C237.194 19.811 228.089 19.8079 218.891 19.8047C209.501 19.8015 200.014 19.7983 190.735 19.7983C187.652 19.7983 184.564 19.8344 181.474 19.8705C179.725 19.891 177.976 19.9114 176.227 19.9253C173.041 19.8386 169.885 19.9069 166.743 19.9749C165.298 20.0061 163.857 20.0373 162.416 20.0534C152.071 20.1637 141.706 20.1718 131.337 20.1799C124.919 20.1849 118.499 20.19 112.081 20.2192C84.7315 20.3213 57.3696 20.4999 30.0204 21.0356C28.6389 21.0641 27.2581 21.0628 25.8807 21.0614C21.713 21.0572 17.5758 21.053 13.5395 21.8775C13.4757 21.8903 13.3354 21.9158 13.2588 21.9285C12.0665 22.1172 11.9644 22.3867 11.8625 22.6555C11.8128 22.7864 11.7633 22.9171 11.5878 23.0383C9.16411 24.7349 11.1158 25.2196 18.4634 24.8497C19.9084 24.7803 21.4372 24.8053 22.9264 24.8295C23.0805 24.832 23.2341 24.8345 23.3872 24.8369C25.912 24.8794 29.5812 24.8426 32.8771 24.8096C34.5268 24.793 36.0829 24.7774 37.3552 24.7732C39.6743 24.7539 42.1093 24.6639 44.492 24.5759C46.8537 24.4886 49.164 24.4032 51.2594 24.3905C60.2079 24.4223 69.1531 24.4511 78.0983 24.4798C87.0435 24.5085 95.9888 24.5372 104.937 24.5691C115.308 24.4989 125.675 24.4319 136.043 24.365C146.411 24.298 156.778 24.231 167.149 24.1609C178.197 24.1609 189.246 24.1577 200.293 24.1545C211.336 24.1513 222.378 24.1481 233.417 24.1481C238.735 24.1261 244.053 24.1135 249.371 24.101C268.648 24.0556 287.928 24.0102 307.224 23.5103C317.424 23.2399 327.685 23.1707 337.953 23.1015C344.635 23.0564 351.32 23.0114 357.993 22.9108C364.984 22.8087 369.525 21.8392 369.627 20.334C369.722 18.9871 363.884 19.0191 359.84 19.0413C359.518 19.043 359.207 19.0447 358.912 19.0457C334.366 19.2534 309.761 19.4611 285.153 19.6688L281.903 19.6962C278.227 19.7047 273.872 19.7145 269.511 19.7243Z"></path>
                        </svg>
                    </span>
                </h1>
            </div>

            <p class="text-xl md:text-2xl font-bold font-hand text-[#3D3D3D] -rotate-1">
                // Web Developer & Tech Explorer
            </p>
            <div class="flex flex-wrap justify-center lg:justify-start gap-4 pt-4">
                <a href="#projects" class="bg-[#FF6B55] text-white px-10 py-4 neo-border font-black uppercase font-space neo-button rotate-sketch hover:rotate-0">View Work</a>
            </div>
        </div>

        <div class="relative flex justify-center">
            <div class="bg-white p-4 rotate-3 neo-border relative group">
                <!-- Sketchy "Tape" effect -->
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 w-20 h-8 bg-[#FF6B55]/40 -rotate-2 border-x-2 border-black/10"></div>

                <img id="simon" src="./alexanderIMAGES/IMG_3543-removebg-preview.png" alt="Profile Image" class="w-full max-w-sm grayscale group-hover:grayscale-0 transition-all duration-700 aspect-[3/4] object-cover">

                <!-- Handwritten caption -->
                <div class="absolute -bottom-10 -right-4 bg-white px-4 py-1 neo-border-small font-hand text-sm rotate-[-5deg]">
                    Brahim Mokhtar
                </div>
            </div>

            <!-- Hand-drawn decorative circle -->
            <div class="absolute -top-10 -right-10 w-24 h-24 border-4 border-[#FF6B55] rounded-full opacity-20 animate-pulse hidden md:block" style="border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;"></div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="bg-white py-32 border-y-4 border-[#1A1A1A] relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-6 space-y-16 relative z-10">
            <h2 class="inline-block bg-[#1A1A1A] text-white px-8 py-3 rotate-[-1.5deg] font-space font-black text-3xl uppercase tracking-widest">
                Brief Intro
            </h2>
            <div class="space-y-10 text-2xl md:text-4xl font-black font-space leading-[1.1] tracking-tight">
                <p>Hello! I'm <span class="text-[#FF6B55]">Remili Mohamed Brahim Mokhtar.</span></p>
                <p>i start learning computer science at<span class="bg-[#FF6B55] text-white px-2">age 20</span>. at first it was only for curiosity with python and gdscript.</p>
                <div class="relative inline-block mt-4">
                    <p class="relative z-10 italic">Now im building a career as a web developer with a focus on Laravel.</p>
                    <div class="absolute inset-0 bg-[#FF6B55]/10 -rotate-1 -z-10 w-[110%] -left-[5%] h-full"></div>
                </div>
            </div>
        </div>

        <!-- Distant sketchy decorations -->
        <div class="absolute top-1/4 -right-20 opacity-10 rotate-45 select-none pointer-events-none">
            <span class="text-[10rem] font-hand font-bold">"CODE"</span>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="max-w-7xl mx-auto px-6 py-32 space-y-24">
        <div class="text-center space-y-4">
            <h2 class="text-5xl md:text-7xl font-black font-space uppercase tracking-tighter">Tools I Use</h2>
            <p class="font-hand text-xl text-[#3D3D3D]">A mix of logic, design, and continuous learning.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
            <!-- Languages -->
            <div id="lan" class="space-y-10 bg-white p-8 neo-border rotate-sketch">
                <h3 class="text-2xl font-black font-space bg-black text-white px-6 py-2 uppercase inline-block -translate-y-12 -translate-x-4 border-2 border-white">Languages</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
                    <div class="flex flex-col items-center justify-center p-4 group transition-colors hover:text-[#FF6B55]">
                        <img src="./alexanderIMAGES/javascript-logo-svgrepo-com.svg" class="w-16 h-16 grayscale group-hover:grayscale-0 transition-all filter group-hover:drop-shadow-[4px_4px_0px_#1A1A1A]" alt="JS">
                        <span class="font-bold text-xs uppercase font-space mt-4">JavaScript</span>
                    </div>
                    <div class="flex flex-col items-center justify-center p-4 group transition-colors hover:text-[#FF6B55]">
                        <img src="./alexanderIMAGES/php-svgrepo-com.svg" class="w-16 h-16 grayscale group-hover:grayscale-0 transition-all filter group-hover:drop-shadow-[4px_4px_0px_#1A1A1A]" alt="PHP">
                        <span class="font-bold text-xs uppercase font-space mt-4">PHP</span>
                    </div>
                    <div class="flex flex-col items-center justify-center p-4 group transition-colors hover:text-[#FF6B55]">
                        <img src="./alexanderIMAGES/mysql-logo-svgrepo-com.svg" class="w-16 h-16 grayscale group-hover:grayscale-0 transition-all filter group-hover:drop-shadow-[4px_4px_0px_#1A1A1A]" alt="MySQL">
                        <span class="font-bold text-xs uppercase font-space mt-4">MySQL</span>
                    </div>
                </div>
            </div>

            <!-- Frameworks -->
            <div class="space-y-10 bg-white p-8 neo-border rotate-sketch-alt">
                <h3 class="text-2xl font-black font-space bg-[#FF6B55] text-white px-6 py-2 uppercase inline-block -translate-y-12 -translate-x-4 border-2 border-white">Modern Stack</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
                    <div class="flex flex-col items-center justify-center p-4 group transition-colors hover:text-[#FF6B55]">
                        <img src="./alexanderIMAGES/laravel-svgrepo-com.svg" class="w-16 h-16 grayscale group-hover:grayscale-0 transition-all filter group-hover:drop-shadow-[4px_4px_10px_rgba(255,107,85,0.4)]" alt="Laravel">
                        <span class="font-bold text-xs uppercase font-space mt-4">Laravel</span>
                    </div>
                    <div class="flex flex-col items-center justify-center p-4 group relative">
                        <img src="https://logo.svgcdn.com/devicon/livewire-original.png" class="w-16 h-16 grayscale group-hover:grayscale-0 transition-all filter group-hover:drop-shadow-[4px_4px_10px_rgba(255,107,85,0.4)]" alt="Livewire">
                        <span class="font-bold text-xs uppercase font-space mt-4 group-hover:text-[#FF6B55]">Livewire</span>
                        <!-- Tiny badge -->
                        <span class="absolute top-2 right-2 font-hand text-[10px] text-[#FF6B55] rotate-12">Dynamic!</span>
                    </div>
                    <div class="flex flex-col items-center justify-center p-4 group">
                        <img src="/alexanderIMAGES/Tailwind_CSS_Logo.svg.png" class="w-16 h-auto grayscale group-hover:grayscale-0 transition-all filter group-hover:drop-shadow-[4px_4px_10px_rgba(6,182,212,0.4)]" alt="Tailwind">
                        <span class="font-bold text-xs uppercase font-space mt-4 group-hover:text-cyan-400">Tailwind</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Skills -->
        <div class="mt-20 bg-white p-8 neo-border rotate-sketch max-w-4xl mx-auto">
            <h3 class="text-2xl font-black font-space bg-black text-white px-6 py-2 uppercase inline-block -translate-y-12 -translate-x-4 border-2 border-white">OTHER TOOLS & OS</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-8">
                <div class="flex flex-col items-center justify-center p-4 group transition-colors hover:text-[#FF6B55]">
                    <img src="https://logo.svgcdn.com/logos/git-icon.png" class="w-14 h-14 grayscale group-hover:grayscale-0 transition-all filter group-hover:drop-shadow-[4px_4px_0px_#1A1A1A]" alt="Git">
                    <span class="font-bold text-xs uppercase font-space mt-4">Git</span>
                </div>
                <div class="flex flex-col items-center justify-center p-4 group transition-colors hover:text-[#FF6B55]">
                    <img src="/alexanderIMAGES/Arch-linux-logo.png" class="w-20 h-auto grayscale group-hover:grayscale-0 transition-all filter group-hover:drop-shadow-[4px_4px_0px_#1A1A1A]" alt="Arch Linux">
                    <span class="font-bold text-xs uppercase font-space mt-4">Arch Linux</span>
                </div>
                <div class="flex flex-col items-center justify-center p-4 group transition-colors hover:text-[#FF6B55]">
                    <img src="https://www.kindpng.com/picc/m/402-4027556_krita-logo-png-transparent-png.png" class="w-16 h-16 grayscale group-hover:grayscale-0 transition-all filter group-hover:drop-shadow-[4px_4px_0px_#1A1A1A]" alt="Krita">
                    <span class="font-bold text-xs uppercase font-space mt-4">Krita</span>
                </div>
                <div class="flex flex-col items-center justify-center p-4 group relative opacity-50 select-none">
                    <span class="text-3xl font-black font-space text-black opacity-20">???</span>
                    <span class="font-bold text-xs uppercase font-space mt-4">Learning...</span>
                    <div class="absolute -top-1 -right-1 font-hand text-[10px] text-[#FF6B55] rotate-12">New!</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="bg-[#1A1A1A] py-32 text-white relative">
        <div class="max-w-7xl mx-auto px-6 space-y-20 relative z-10">
            <div class="space-y-4">
                <h2 class="text-5xl md:text-7xl font-black font-space uppercase">Projects Vault</h2>
                <div class="h-1 w-32 bg-[#FF6B55]"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Weather -->
                <div class="bg-white text-[#1A1A1A] p-6 space-y-6 group hover:-translate-y-2 transition-transform neo-border">
                    <div class="aspect-video bg-gray-100 overflow-hidden neo-border-small relative">
                        <img src="./alexanderIMAGES/Screenshot_20260308_012658.png" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" alt="Weather">
                        <div class="absolute inset-0 bg-black/5 group-hover:bg-transparent transition-colors"></div>
                    </div>
                    <div class="space-y-2">
                        <h4 class="text-2xl font-black font-space uppercase tracking-tight">Dynamic Portfolio</h4>
                        <p class="text-sm font-medium text-[#3D3D3D] font-inter">Dynamic portfolio. Built with Laravel and Livewire. with chat bot using gemini API.</p>
                    </div>
                    <a href="https://github.com/ibra01001/livewire-portfolio" target="_blank" class="block w-full text-center py-3 bg-black text-white font-bold uppercase font-space transition-all hover:bg-[#FF6B55] neo-border-small">View Code</a>
                </div>

                <!-- Undertale -->
                <div class="bg-white text-[#1A1A1A] p-6 space-y-6 group hover:-translate-y-2 transition-transform neo-border relative">


                    <div class="aspect-video bg-gray-100 overflow-hidden neo-border-small relative">
                        <img src="./alexanderIMAGES/Screenshot_20260307_193938.png" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" alt="Undertale">
                    </div>
                    <div class="space-y-2">
                        <h4 class="text-2xl font-black font-space uppercase tracking-tight">Uprize services web</h4>
                        <p class="text-sm font-medium text-[#3D3D3D] font-inter">Saas web that help entreprises to find influencers and other digital services. built with Laravel and Livewire. used cloudinary for video storage. </p>
                    </div>
                    <a href="https://github.com/Uprize-DZ/Uprize-website" target="_blank" class="block w-full text-center py-3 bg-[#FF6B55] text-white font-bold uppercase font-space transition-all hover:bg-black neo-border-small">View Repo</a>
                </div>

                <!-- Speed Test -->
                <div class="bg-white text-[#1A1A1A] p-6 space-y-6 group hover:-translate-y-2 transition-transform neo-border">
                    <div class="aspect-video bg-gray-100 overflow-hidden neo-border-small relative">
                        <img src="./alexanderIMAGES/Screenshot_20260125_150914.png" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" alt="Speed Test">
                    </div>
                    <div class="space-y-2">
                        <h4 class="text-2xl font-black font-space uppercase tracking-tight">Ecommerce Web with Laravel</h4>
                        <p class="text-sm font-medium text-[#3D3D3D] font-inter">A fully functional e-commerce website built with Laravel, featuring product management, shopping cart, and order processing, fully customizable.</p>
                    </div>
                    <a href="https://github.com/ibra01001/ecommerce-web-with-laravel" target="_blank" class="block w-full text-center py-3 bg-white text-black font-bold uppercase font-space transition-all hover:bg-[#FF6B55] hover:text-white neo-border-small">View Repo</a>
                    <a href="https://metrowisedz.com/" target="_blank" class="block w-full text-center py-3 bg-white text-black font-bold uppercase font-space transition-all hover:bg-[#FF6B55] hover:text-white neo-border-small">View Live</a>
                </div>
            </div>
        </div>

        <!-- Background scribble -->
        <div class="absolute bottom-0 left-0 w-full h-32 opacity-10 bg-repeat-x pointer-events-none select-none" style="background-image: radial-gradient(#FF6B55 1px, transparent 1px); background-size: 20px 20px;"></div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-[#F5F3EF] border-t-4 border-black py-32 overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-6 text-center space-y-16">
            <div class="relative inline-block">
                <h2 class="text-5xl md:text-8xl font-black font-space uppercase tracking-tighter relative z-10">Say Hello!</h2>
                <div class="absolute -bottom-2 md:-bottom-4 left-0 w-[110%] h-3 bg-[#FF6B55] -rotate-1 -z-10"></div>
            </div>

            <div class="flex flex-wrap justify-center gap-8">
                <a href="https://github.com/ibra01001" target="_blank" class="bg-white p-6 neo-border hover:rotate-6 transition-transform text-4xl"><i class="bi bi-github"></i></a>
                <a href="https://www.instagram.com/portal_eyes/" target="_blank" class="bg-white p-6 neo-border hover:rotate-[-6deg] transition-transform text-4xl text-pink-600"><i class="bi bi-instagram"></i></a>
                <a href="https://web.facebook.com/tf.ue.355/" target="_blank" class="bg-white p-6 neo-border hover:rotate-2 transition-transform text-4xl text-blue-600"><i class="bi bi-facebook"></i></a>
                <a href="mailto:mohamedremili5000@gmail.com" class="bg-[#FF6B55] p-6 neo-border text-white hover:scale-110 transition-transform text-4xl"><i class="bi bi-envelope-at"></i></a>
            </div>

            <div class="pt-24 space-y-6 relative">


                <p id="made" class="font-hand text-xl font-bold uppercase tracking-widest text-black/40">
                    &copy; 2026 // Handcrafted in Algeria by Ibrahim
                </p>
                <div class="inline-block px-4 py-1 bg-black text-white font-space font-black text-[10px] uppercase tracking-tighter skew-x-[-10deg]">
                    This Portfolio is temporary the final version will be available soon.
                </div>
            </div>
        </div>
    </footer>
</body>

</html>