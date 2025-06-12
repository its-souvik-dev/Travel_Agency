@extends('layouts.layouts')

@section('title', 'Dashboard')

@section('content')
    <!-- Dashboard Content -->
    <div class="container mx-auto px-4 sm:px-6 py-6">
        <!-- Overview Section -->
        <section id="overview" class="mb-10 fade-in">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-gray-800">Dashboard Overview</h2>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Bookings -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out fade-in fade-in-delay-1">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Bookings</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">1,248</h3>
                            <p class="text-green-500 text-sm mt-2">↑ 12% from last month</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Revenue -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out fade-in fade-in-delay-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Revenue</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">$84,560</h3>
                            <p class="text-green-500 text-sm mt-2">↑ 8% from last month</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Active Customers -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out fade-in fade-in-delay-3">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Active Customers</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">892</h3>
                            <p class="text-green-500 text-sm mt-2">↑ 5% from last month</p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Popular Destination -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Top Destination</p>
                            <h3 class="text-2xl font-bold text-gray-800 mt-1">Bali</h3>
                            <p class="text-gray-600 text-sm mt-2">156 bookings this month</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Revenue Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-8 fade-in fade-in-delay-1">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-semibold text-gray-800">Revenue Overview</h3>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm bg-gray-100 rounded-lg">Monthly</button>
                        <button class="px-3 py-1 text-sm bg-black text-white rounded-lg">Yearly</button>
                    </div>
                </div>
                <!-- Chart.js Canvas -->
                <canvas id="revenueChart" class="h-64"></canvas>
            </div>
            
            <!-- Recent Bookings & Popular Destinations -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Bookings -->
                <div class="bg-white rounded-xl shadow-lg p-6 fade-in fade-in-delay-2">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6">Recent Bookings</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                            <div class="flex items-center space-x-4">
                                <img src="https://via.placeholder.com/40x40?text=User1" alt="User" class="w-10 h-10 rounded-full">
                                <div>
                                    <p class="font-medium text-gray-800">Sarah Johnson</p>
                                    <p class="text-sm text-gray-500">Paris, France</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">Confirmed</span>
                        </div>
                        <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                            <div class="flex items-center space-x-4">
                                <img src="https://via.placeholder.com/40x40?text=User2" alt="User" class="w-10 h-10 rounded-full">
                                <div>
                                    <p class="font-medium text-gray-800">Michael Chen</p>
                                    <p class="text-sm text-gray-500">Bali, Indonesia</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Pending</span>
                        </div>
                        <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                            <div class="flex items-center space-x-4">
                                <img src="https://via.placeholder.com/40x40?text=User3" alt="User" class="w-10 h-10 rounded-full">
                                <div>
                                    <p class="font-medium text-gray-800">Emma Wilson</p>
                                    <p class="text-sm text-gray-500">New York, USA</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">Confirmed</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <img src="https://via.placeholder.com/40x40?text=User4" alt="User" class="w-10 h-10 rounded-full">
                                <div>
                                    <p class="font-medium text-gray-800">David Kim</p>
                                    <p class="text-sm text-gray-500">Tokyo, Japan</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-red-100 text-red-800 text-xs rounded-full">Cancelled</span>
                        </div>
                    </div>
                    <a href="#bookings" class="block text-center mt-6 text-blue-600 hover:text-blue-800 font-medium transition duration-300">View All Bookings</a>
                </div>
                
                <!-- Popular Destinations -->
                <div class="bg-white rounded-xl shadow-lg p-6 fade-in fade-in-delay-3">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6">Popular Destinations</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                            <div class="flex items-center space-x-4">
                                <img src="https://via.placeholder.com/60x60?text=Bali" alt="Bali" class="w-12 h-12 rounded-lg object-cover">
                                <div>
                                    <p class="font-medium text-gray-800">Bali, Indonesia</p>
                                    <p class="text-sm text-gray-500">156 bookings this month</p>
                                </div>
                            </div>
                            <span class="text-gray-800 font-medium">$1,240</span>
                        </div>
                        <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                            <div class="flex items-center space-x-4">
                                <img src="https://via.placeholder.com/60x60?text=Paris" alt="Paris" class="w-12 h-12 rounded-lg object-cover">
                                <div>
                                    <p class="font-medium text-gray-800">Paris, France</p>
                                    <p class="text-sm text-gray-500">128 bookings this month</p>
                                </div>
                            </div>
                            <span class="text-gray-800 font-medium">$1,850</span>
                        </div>
                        <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                            <div class="flex items-center space-x-4">
                                <img src="https://via.placeholder.com/60x60?text=Tokyo" alt="Tokyo" class="w-12 h-12 rounded-lg object-cover">
                                <div>
                                    <p class="font-medium text-gray-800">Tokyo, Japan</p>
                                    <p class="text-sm text-gray-500">98 bookings this month</p>
                                </div>
                            </div>
                            <span class="text-gray-800 font-medium">$2,100</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <img src="https://via.placeholder.com/60x60?text=New+York" alt="New York" class="w-12 h-12 rounded-lg object-cover">
                                <div>
                                    <p class="font-medium text-gray-800">New York, USA</p>
                                    <p class="text-sm text-gray-500">87 bookings this month</p>
                                </div>
                            </div>
                            <span class="text-gray-800 font-medium">$1,650</span>
                        </div>
                    </div>
                    <a href="#destinations" class="block text-center mt-6 text-blue-600 hover:text-blue-800 font-medium transition duration-300">View All Destinations</a>
                </div>
            </div>
        </section>
        
        <!-- Bookings Section -->
        <section id="bookings" class="mb-10 fade-in">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-gray-800">Bookings Management</h2>
            
            <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in fade-in-delay-1">
                <!-- Booking Filters -->
                <div class="p-6 border-b border-gray-100">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                        <div class="relative">
                            <input type="text" placeholder="Search bookings..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-full md:w-64">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div class="flex space-x-2">
                            <select class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option>All Status</option>
                                <option>Confirmed</option>
                                <option>Pending</option>
                                <option>Cancelled</option>
                            </select>
                            <select class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option>Sort By</option>
                                <option>Newest</option>
                                <option>Oldest</option>
                                <option>Price: High to Low</option>
                                <option>Price: Low to High</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Bookings Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Destination</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#BK-1254</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://via.placeholder.com/40x40?text=User1" alt="" class="w-8 h-8 rounded-full mr-2">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Sarah Johnson</div>
                                            <div class="text-sm text-gray-500">sarah@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Paris, France</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15-22 Jun 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$1,850</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#BK-1253</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://via.placeholder.com/40x40?text=User2" alt="" class="w-8 h-8 rounded-full mr-2">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Michael Chen</div>
                                            <div class="text-sm text-gray-500">michael@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Bali, Indonesia</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10-20 Jul 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$1,240</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#BK-1252</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://via.placeholder.com/40x40?text=User3" alt="" class="w-8 h-8 rounded-full mr-2">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Emma Wilson</div>
                                            <div class="text-sm text-gray-500">emma@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">New York, USA</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">05-12 Aug 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$1,650</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Confirmed</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#BK-1251</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://via.placeholder.com/40x40?text=User4" alt="" class="w-8 h-8 rounded-full mr-2">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">David Kim</div>
                                            <div class="text-sm text-gray-500">david@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Tokyo, Japan</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">22-30 Sep 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$2,100</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 flex items-center justify-between border-t border-gray-200">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</a>
                        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">24</span> results
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">3</a>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Destinations Section -->
        <section id="destinations" class="mb-10 fade-in">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-gray-800">Destinations Management</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Destination Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out fade-in fade-in-delay-1">
                    <img src="https://via.placeholder.com/600x400?text=Paris" alt="Paris" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-semibold mb-2 text-gray-800">Paris, France</h3>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Featured</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Experience the romance and culture of the City of Light.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-bold">$1,850</span>
                            <div class="flex space-x-2">
                                <button class="text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <button class="text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Destination Card 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out fade-in fade-in-delay-2">
                    <img src="https://via.placeholder.com/600x400?text=Bali" alt="Bali" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-semibold mb-2 text-gray-800">Bali, Indonesia</h3>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Popular</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Relax in tropical paradise with stunning beaches and temples.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-bold">$1,240</span>
                            <div class="flex space-x-2">
                                <button class="text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <button class="text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Destination Card 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out fade-in fade-in-delay-3">
                    <img src="https://via.placeholder.com/600x400?text=New+York" alt="New York" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-semibold mb-2 text-gray-800">New York, USA</h3>
                            <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">Trending</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">Discover the vibrant energy of the Big Apple.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-bold">$1,650</span>
                            <div class="flex space-x-2">
                                <button class="text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <button class="text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Add New Destination Button -->
            <div class="mt-8 text-center fade-in">
                <button class="bg-black text-white px-6 py-3 rounded-full font-semibold hover:bg-gray-800 transition duration-300 ease-in-out transform hover:scale-105 flex items-center mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add New Destination
                </button>
            </div>
        </section>
        
        <!-- Customers Section -->
        <section id="customers" class="mb-10 fade-in">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-gray-800">Customers Management</h2>
            
            <div class="bg-white rounded-xl shadow-lg overflow-hidden fade-in fade-in-delay-1">
                <!-- Customer Filters -->
                <div class="p-6 border-b border-gray-100">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                        <div class="relative">
                            <input type="text" placeholder="Search customers..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-full md:w-64">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div class="flex space-x-2">
                            <select class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option>All Customers</option>
                                <option>Active</option>
                                <option>Inactive</option>
                                <option>VIP</option>
                            </select>
                            <button class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition duration-300">
                                Export
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Customers Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bookings</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://via.placeholder.com/40x40?text=User1" alt="" class="w-10 h-10 rounded-full mr-3">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Sarah Johnson</div>
                                            <div class="text-sm text-gray-500">Joined Jun 2022</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">sarah@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">(555) 123-4567</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">12</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://via.placeholder.com/40x40?text=User2" alt="" class="w-10 h-10 rounded-full mr-3">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Michael Chen</div>
                                            <div class="text-sm text-gray-500">Joined Mar 2023</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">michael@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">(555) 987-6543</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">New</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://via.placeholder.com/40x40?text=User3" alt="" class="w-10 h-10 rounded-full mr-3">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">Emma Wilson</div>
                                            <div class="text-sm text-gray-500">Joined Jan 2021</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">emma@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">(555) 456-7890</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">24</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">VIP</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img src="https://via.placeholder.com/40x40?text=User4" alt="" class="w-10 h-10 rounded-full mr-3">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">David Kim</div>
                                            <div class="text-sm text-gray-500">Joined Nov 2022</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">david@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">(555) 789-0123</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">7</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Inactive</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                                    <a href="#" class="text-gray-600 hover:text-gray-900">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 flex items-center justify-between border-t border-gray-200">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</a>
                        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">32</span> results
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">3</a>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Revenue ($)',
                        data: [12000, 19000, 15000, 22000, 18000, 25000],
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush