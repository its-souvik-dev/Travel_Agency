<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - ExploreWorld</title>
    <!-- Vite for Tailwind CSS -->
    @vite('resources/css/app.css')
    <style>
        /* Custom animation for fade-in effect */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        /* Hide mobile menu by default */
        #mobile-menu {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Navigation Bar -->
    <header class="bg-black text-white">
        <nav class="container mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
            <div class="text-2xl sm:text-3xl font-extrabold tracking-tight">ExploreWorld</div>
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ url('/') }}" class="text-base hover:text-gray-300 transition duration-300 ease-in-out transform hover:-translate-y-1">Home</a>
                <a href="{{ url('/#destinations') }}" class="text-base hover:text-gray-300 transition duration-300 ease-in-out transform hover:-translate-y-1">Destinations</a>
            </div>
            <!-- Hamburger Icon for Mobile -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden bg-black text-white px-4 sm:px-6 pb-4">
            <a href="{{ url('/') }}" class="block py-2 text-base hover:text-gray-300 transition duration-300">Home</a>
            <a href="{{ url('/#destinations') }}" class="block py-2 text-base hover:text-gray-300 transition duration-300">Destinations</a>
        </div>
    </header>

    <!-- Main Content with Sidebar -->
    <main class="container mx-auto px-4 sm:px-6 py-10 sm:py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Sidebar -->
            <aside class="md:col-span-1 bg-white rounded-xl shadow-xl p-6 fade-in">
                @yield('sidebar')
            </aside>
            <!-- Main Content -->
            <section class="md:col-span-3 bg-white rounded-xl shadow-xl p-6 fade-in">
                @yield('content')
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white py-6 sm:py-8">
        <div class="container mx-auto px-4 sm:px-6 text-center">
            <p class="text-base sm:text-lg">© {{ date('Y') }} ExploreWorld Travel Agency. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', () => {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.style.display = mobileMenu.style.display === 'block' ? 'none' : 'block';
        });
    </script>
</body>
</html>