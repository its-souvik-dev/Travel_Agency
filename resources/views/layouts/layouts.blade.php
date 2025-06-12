<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExploreWorld - @yield('title', 'Dashboard')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* Custom animation for fade-in effect */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
        /* Delay animations for staggered effect */
        .fade-in-delay-1 { animation-delay: 0.2s; }
        .fade-in-delay-2 { animation-delay: 0.4s; }
        .fade-in-delay-3 { animation-delay: 0.6s; }
        /* Hide mobile menu by default */
        #mobile-menu {
            display: none;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Navigation -->
    <header class="bg-black text-white">
        <nav class="container mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}"><h1 class="text-3xl">Dashboard</h1></a>
            </div>
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('travel-plans.index') }}" class="text-base hover:text-gray-300 transition duration-300 ease-in-out transform hover:-translate-y-1">Custom plans</a>
                <a href="#bookings" class="text-base hover:text-gray-300 transition duration-300 ease-in-out transform hover:-translate-y-1">Bookings</a>
                <a href="#destinations" class="text-base hover:text-gray-300 transition duration-300 ease-in-out transform hover:-translate-y-1">Destinations</a>
                <a href="#customers" class="text-base hover:text-gray-300 transition duration-300 ease-in-out transform hover:-translate-y-1">Customers</a>
                <div class="relative">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-user-shield text-gray-100 text-sm"></i>
                    </div>  
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-white text-black px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-600 hover:text-white transition duration-300 ease-in-out transform">Logout</button>
                </form>
            </div>
            <!-- Hamburger Icon for Mobile -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden bg-black text-white px-4 sm:px-6 pb-4">
            <div class="flex items-center py-2">
                <img src="https://via.placeholder.com/150x50?text=ExploreWorld+Logo" alt="ExploreWorld Logo" class="h-8 w-auto">
            </div>
            <a href="#overview" class="block py-2 text-base hover:text-gray-300 transition duration-300">Overview</a>
            <a href="#bookings" class="block py-2 text-base hover:text-gray-300 transition duration-300">Bookings</a>
            <a href="#destinations" class="block py-2 text-base hover:text-gray-300 transition duration-300">Destinations</a>
            <a href="#customers" class="block py-2 text-base hover:text-gray-300 transition duration-300">Customers</a>
            <div class="py-2">
                <span class="text-sm font-medium">Admin</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block py-2 text-base bg-white text-black px-4 rounded-lg font-semibold hover:bg-gray-600 hover:text-white transition duration-300 w-full text-center">Logout</button>
            </form>
        </div>
    </header>

    <!-- Content Section -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white py-6 sm:py-8">
        <div class="container mx-auto px-4 sm:px-6 text-center">
            <p class="text-base sm:text-lg">© {{ date('Y') }} Shadow developer. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu Toggle and Additional Scripts -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', () => {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.style.display = mobileMenu.style.display === 'block' ? 'none' : 'block';
        });

        @stack('scripts')
    </script>
</body>
</html>