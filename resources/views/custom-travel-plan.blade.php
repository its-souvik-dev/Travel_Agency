@extends('layouts.layouts')

@section('title', 'Custom Travel Plan')

@section('content')
    <!-- Custom Travel Plan Content -->
    <div class="container mx-auto px-4 sm:px-6 py-6">
        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-6 fade-in">
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-6 fade-in">
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg" role="alert">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <!-- Header Section -->
        <section id="travel-plan-header" class="mb-10 fade-in">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-gray-800">Create Your Custom Travel Plan</h2>
            <p class="text-gray-600 text-sm sm:text-base mb-6">Tailor your perfect trip by selecting your preferences below. We'll craft a personalized itinerary just for you.</p>
            
            @guest
                <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded-lg mb-6">
                    <p>Want to save your travel plans? <a href="{{ route('register') }}" class="font-semibold underline">Register</a> or <a href="{{ route('login') }}" class="font-semibold underline">Login</a> to access your saved plans.</p>
                </div>
            @endguest
        </section>

        <!-- Travel Plan Form -->
        <section id="travel-plan-form" class="mb-10 fade-in fade-in-delay-1">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Travel Preferences</h3>
                <form id="travelPlanForm" action="{{ route('custom-travel-plan.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Destination -->
                        <div>
                            <label for="destination" class="block text-sm font-medium text-gray-700">Destination *</label>
                            <select id="destination" name="destination" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('destination') border-red-500 @enderror">
                                <option value="">Select a destination</option>
                                @foreach ($destinations as $destination)
                                    <option value="{{ $destination }}" {{ old('destination') == $destination ? 'selected' : '' }}>{{ $destination }}</option>
                                @endforeach
                            </select>
                            @error('destination')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Travel Dates -->
                        <div>
                            <label for="travel_dates" class="block text-sm font-medium text-gray-700">Travel Dates *</label>
                            <input type="text" id="travel_dates" name="travel_dates" value="{{ old('travel_dates') }}" required placeholder="e.g., 15-22 Jun 2025" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('travel_dates') border-red-500 @enderror">
                            @error('travel_dates')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Budget -->
                        <div>
                            <label for="budget" class="block text-sm font-medium text-gray-700">Budget (USD) *</label>
                            <div class="mt-1 relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" id="budget" name="budget" value="{{ old('budget') }}" min="0" step="100" required placeholder="e.g., 2000" class="block w-full pl-7 pr-12 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('budget') border-red-500 @enderror">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">USD</span>
                                </div>
                            </div>
                            @error('budget')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Travelers -->
                        <div>
                            <label for="travelers" class="block text-sm font-medium text-gray-700">Number of Travelers</label>
                            <input type="number" 
                                id="travelers" 
                                name="travelers" 
                                value="{{ old('travelers' , 1) }}" 
                                min="1" 
                                max="20" 
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                required>
                        </div>
                        
                        <!-- Activities -->
                        <div class="sm:col-span-2">
                            <label for="activities" class="block text-sm font-medium text-gray-700">Preferred Activities</label>
                            <select id="activities" name="activities[]" multiple class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('activities') border-red-500 @enderror">
                                @foreach ($activities as $activity)
                                    <option value="{{ $activity }}" {{ in_array($activity, old('activities', [])) ? 'selected' : '' }}>{{ $activity }}</option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-sm text-gray-500">Hold Ctrl/Cmd to select multiple options</p>
                            @error('activities')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Additional Notes -->
                        <div class="sm:col-span-2">
                            <label for="notes" class="block text-sm font-medium text-gray-700">Additional Notes</label>
                            <textarea id="notes" name="notes" rows="3" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="text-center pt-4">
                        <button type="submit" class="bg-black text-white px-8 py-3 rounded-full font-semibold hover:bg-gray-800 transition duration-300 ease-in-out transform hover:scale-105 flex items-center mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            {{ auth()->check() ? 'Save Travel Plan' : 'Preview Travel Plan' }}
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Plan Summary -->
        @if(old())
        <section id="plan-summary" class="mb-10 fade-in fade-in-delay-2">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Your Travel Plan Summary</h3>
                <div id="summary-content" class="text-gray-600">
                    <div class="space-y-4 text-sm">
                        <p><strong>Destination:</strong> {{ old('destination') ?? 'Not selected' }}</p>
                        <p><strong>Travel Dates:</strong> {{ old('travel_dates') ?? 'Not specified' }}</p>
                        <p><strong>Budget:</strong> {{ old('budget') ? '$' . number_format(old('budget'), 2) : 'Not specified' }}</p>
                        <p><strong>Travelers:</strong> {{ old('travelers', 1) }}</p>
                        <p><strong>Preferred Activities:</strong> {{ old('activities') ? implode(', ', old('activities')) : 'None selected' }}</p>
                        @if(old('notes'))
                            <p><strong>Additional Notes:</strong> {{ old('notes') }}</p>
                        @endif
                    </div>
                    
                    @auth
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <p class="text-sm text-gray-500">Your plan has been saved to your account.</p>
                    </div>
                    @endauth
                </div>
            </div>
        </section>
        @endif

        <!-- Suggested Itineraries -->
        <section id="itineraries" class="mb-10 fade-in fade-in-delay-3">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-gray-800">Suggested Itineraries</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Itinerary Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out fade-in fade-in-delay-1">
                    <img src="{{ asset('images/paris.jpg') }}" alt="Paris Itinerary" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 text-gray-800">Paris Adventure</h3>
                        <p class="text-gray-600 text-sm mb-4">7 days exploring Paris with sightseeing and cultural activities.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-bold">$1,850</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">View Details</a>
                        </div>
                    </div>
                </div>
                
                <!-- Itinerary Card 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out fade-in fade-in-delay-2">
                    <img src="{{ asset('images/bali.jpg') }}" alt="Bali Itinerary" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 text-gray-800">Bali Retreat</h3>
                        <p class="text-gray-600 text-sm mb-4">10 days of relaxation and adventure in Bali.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-bold">$1,240</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">View Details</a>
                        </div>
                    </div>
                </div>
                
                <!-- Itinerary Card 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 ease-in-out fade-in fade-in-delay-3">
                    <img src="{{ asset('images/tokyo.jpg') }}" alt="Tokyo Itinerary" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2 text-gray-800">Tokyo Explorer</h3>
                        <p class="text-gray-600 text-sm mb-4">8 days discovering Tokyo's cultural and modern attractions.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 font-bold">$2,100</span>
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- User's Saved Plans (for logged in users) -->
        <!-- User's Saved Plans (for logged in users) -->
        @auth
            @isset($userPlans)
                @if($userPlans->count() > 0)
                <section id="saved-plans" class="mb-10 fade-in fade-in-delay-4">
                    <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-gray-800">Your Saved Travel Plans</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($userPlans as $plan)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2 text-gray-800">{{ $plan->destination }}</h3>
                                <p class="text-gray-600 text-sm mb-2"><strong>Dates:</strong> {{ $plan->travel_dates }}</p>
                                <p class="text-gray-600 text-sm mb-2"><strong>Budget:</strong> ${{ number_format($plan->budget, 2) }}</p>
                                <p class="text-gray-600 text-sm mb-4"><strong>Activities:</strong> {{ $plan->activities ? implode(', ', $plan->activities) : 'None' }}</p>
                                {{-- <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">{{ $plan->created_at->diffForHumans() }}</span>
                                    <a href="{{ route('travel-plans.show', $plan->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">View Details</a>
                                </div> --}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif
            @endisset
        @endauth
    </div>
@endsection

@push('styles')
<style>
    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }
    .fade-in-delay-1 {
        animation: fadeIn 0.5s ease-in 0.2s both;
    }
    .fade-in-delay-2 {
        animation: fadeIn 0.5s ease-in 0.4s both;
    }
    .fade-in-delay-3 {
        animation: fadeIn 0.5s ease-in 0.6s both;
    }
    .fade-in-delay-4 {
        animation: fadeIn 0.5s ease-in 0.8s both;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    select[multiple] {
        height: auto;
        min-height: 100px;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize multiple select
        const activitySelect = document.getElementById('activities');
        if (activitySelect) {
            new Choices(activitySelect, {
                removeItemButton: true,
                searchEnabled: true,
                placeholder: true,
                placeholderValue: 'Select activities',
                searchPlaceholderValue: 'Search activities',
                shouldSort: false
            });
        }

        // Form submission handling
        const form = document.getElementById('travelPlanForm');
        if (form) {
            form.addEventListener('submit', function (e) {
                // Client-side validation can be added here if needed
                // Form will submit to server for processing
            });
        }

        // Date picker initialization (if you add a date picker library)
        // Example using flatpickr:
        // flatpickr("#travel_dates", {
        //     mode: "range",
        //     dateFormat: "d M Y",
        //     minDate: "today"
        // });
    });
</script>
@endpush