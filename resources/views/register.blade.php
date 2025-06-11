<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExploreWorld - Register</title>
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
    <!-- Header -->
    <header class="bg-black text-white">
        <nav class="container mx-auto px-4 sm:px-6 py-4 flex justify-between items-center">
            <div class="text-2xl sm:text-3xl font-extrabold tracking-tight">ExploreWorld</div>
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ url('/') }}" class="text-base hover:text-gray-300 transition duration-300 ease-in-out transform hover:-translate-y-1">Home</a>
                <a href="{{ url('/#destinations') }}" class="text-base hover:text-gray-300 transition duration-300 ease-in-out transform hover:-translate-y-1">Destinations</a>
                <a href="{{ route('login') }}" class="bg-white text-black px-4 py-2 rounded-full font-semibold text-sm hover:bg-gray-200 transition duration-300 ease-in-out transform hover:scale-105">Login</a>
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
            <a href="{{ route('login') }}" class="block py-2 text-base bg-white text-black px-4 rounded-full font-semibold hover:bg-gray-200 transition duration-300">Login</a>
        </div>
    </header>

    <!-- Registration Section -->
    <section class="container mx-auto px-4 sm:px-6 py-10 sm:py-12 md:py-16">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-xl p-6 sm:p-8 fade-in">
            <h2 class="text-2xl sm:text-3xl font-bold text-center mb-6 text-gray-800">Create Your Account</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2 text-sm sm:text-base">Name</label>
                    <input type="text" id="name" name="name" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 text-sm sm:text-base" required value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2 text-sm sm:text-base">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 text-sm sm:text-base" required value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2 text-sm sm:text-base">Password</label>
                    <input type="password" id="password" name="password" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 text-sm sm:text-base" required>
                    @error('password')
                        <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 font-medium mb-2 text-sm sm:text-base">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 text-sm sm:text-base" required>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold text-base sm:text-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105">Register</button>
            </form>
            <p class="text-center text-gray-600 text-sm sm:text-base mt-4">Already have an account? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 transition duration-300">Login</a></p>
        </div>
    </section>

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