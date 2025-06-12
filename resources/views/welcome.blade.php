<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExploreWorld - Travel Agency</title>
    <!-- Vite for Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Hero Section -->
    <header class="bg-black text-white">
        <nav class="container mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
            <div class="text-2xl sm:text-3xl font-extrabold tracking-tight">ExploreWorld</div>
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="#home" class="text-base hover:text-gray-300 transition duration-300 ease-in-out transform hover:-translate-y-1">Home</a>
                <a href="#destinations" class="text-base hover:text-gray-300 transition duration-300 ease-in-out transform hover:-translate-y-1">Destinations</a>
                <a href="{{ route('login') }}" class="bg-white text-black px-4 py-2 rounded-full font-semibold text-sm hover:bg-gray-200 transition duration-300 ease-in-out transform hover:scale-105">Login</a>
                <a href="{{ route('register') }}" class="bg-gray-800 text-white px-4 py-2 rounded-full font-semibold text-sm hover:bg-gray-900 transition duration-300 ease-in-out transform hover:scale-105">Register</a>
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
            <a href="#home" class="block py-2 text-base hover:text-gray-300 transition duration-300">Home</a>
            <a href="#destinations" class="block py-2 text-base hover:text-gray-300 transition duration-300">Destinations</a>
            <a href="{{ route('login') }}" class="block py-2 text-base bg-white text-black px-4 rounded-full font-semibold hover:bg-gray-200 transition duration-300">Login</a>
            <a href="{{ route('register') }}" class="block py-2 text-base bg-gray-800 text-white px-4 rounded-full font-semibold hover:bg-gray-900 transition duration-300">Register</a>
        </div>
        <div class="container mx-auto px-4 sm:px-6 py-10 sm:py-12 md:py-16 text-center fade-in">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 sm:mb-6 leading-tight">Discover Your Next Adventure</h1>
            <p class="text-base sm:text-lg md:text-xl mb-6 sm:mb-8 text-gray-300">Explore breathtaking destinations with ExploreWorld Travel Agency.</p>
            <a href="#destinations" class="bg-white text-black px-6 sm:px-8 py-2 sm:py-3 rounded-full font-semibold text-base sm:text-lg hover:bg-gray-200 transition duration-300 ease-in-out transform hover:scale-105">Plan Your Trip</a>
        </div>
    </header>

    <!-- Featured Destinations Section -->
    <section id="destinations" class="container mx-auto px-4 sm:px-6 py-10 sm:py-12 md:py-16">
        <h2 class="text-3xl sm:text-4xl font-bold text-center mb-8 sm:mb-10 text-gray-800 fade-in">Featured Destinations</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8">
            <!-- Destination 1 -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out fade-in fade-in-delay-1">
                <img src="https://via.placeholder.com/400x300?text=Paris" alt="Paris" class="w-full h-48 sm:h-56 object-cover">
                <div class="p-4 sm:p-6">
                    <h3 class="text-xl sm:text-2xl font-semibold mb-2 sm:mb-3 text-gray-800">Paris, France</h3>
                    <p class="text-gray-600 text-sm sm:text-base mb-3 sm:mb-4">Experience the romance and culture of the City of Light.</p>
                    <a href="#destinations" class="text-blue-600 hover:text-blue-800 font-medium text-sm sm:text-base transition duration-300">Learn More</a>
                </div>
            </div>
            <!-- Destination 2 -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out fade-in fade-in-delay-2">
                <img src="https://via.placeholder.com/400x300?text=Bali" alt="Bali" class="w-full h-48 sm:h-56 object-cover">
                <div class="p-4 sm:p-6">
                    <h3 class="text-xl sm:text-2xl font-semibold mb-2 sm:mb-3 text-gray-800">Bali, Indonesia</h3>
                    <p class="text-gray-600 text-sm sm:text-base mb-3 sm:mb-4">Relax in tropical paradise with stunning beaches and temples.</p>
                    <a href="#destinations" class="text-blue-600 hover:text-blue-800 font-medium text-sm sm:text-base transition duration-300">Learn More</a>
                </div>
            </div>
            <!-- Destination 3 -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out fade-in fade-in-delay-3">
                <img src="https://via.placeholder.com/400x300?text=New+York" placeholder="New York" class="w-full h-48 sm:h-56 object-cover">
                <div class="p-4 sm:p-6">
                    <h3 class="text-xl sm:text-2xl font-semibold mb-2 sm:mb-3 text-gray-800">New York, USA</h3>
                    <p class="text-gray-600 text-sm sm:text-base mb-3 sm:mb-4">Discover the vibrant energy of the Big Apple.</p>
                    <a href="#destinations" class="text-blue-600 hover:text-blue-800 font-medium text-sm sm:text-base transition duration-300">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-white py-6 sm:py-8">
        <div class="container mx-auto px-4 sm:px-6 text-center">
            <p class="text-base sm:text-lg">© {{ date('Y') }} Shadow Developer. All rights reserved.</p>
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