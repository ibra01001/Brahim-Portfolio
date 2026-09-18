<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Portfolio') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700;800&family=Inter:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    @stack('styles')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-[#1A1A1A]">
    <div class="min-h-screen bg-[#F5F3EF] flex flex-col relative">
        <!-- Dotted Background Pattern -->
        <div class="fixed inset-0 pointer-events-none"
            style="background-image: radial-gradient(circle, #1A1A1A 1px, transparent 1px); background-size: 24px 24px; opacity: 0.03;">
        </div>

        <!-- Navigation -->
        <div class="relative z-20">
            <livewire:layout.navigation />
        </div>

        <!-- Page Content -->
        <main class="flex-1 relative z-10">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t-2 border-[#1A1A1A] mt-auto relative z-10">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="text-center md:text-left">
                        <h3 class="text-xl font-bold text-[#1A1A1A]" style="font-family: 'Space Grotesk', sans-serif;">
                            RMBM.
                        </h3>
                        <p class="text-[#3D3D3D] mt-2 text-sm">coolest developer ever ;p</p>
                    </div>

                </div>

                <div class="border-t border-gray-200 mt-8 pt-8 text-center text-[#3D3D3D] text-sm">
                    <p>&copy; {{ date('Y') }} Portfolio. Built by Brahim Remili.</p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>