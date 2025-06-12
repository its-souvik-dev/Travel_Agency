@extends('layouts.layouts')

@section('title', 'My Travel Plans')

@section('content')
<div class="container mx-auto px-4 sm:px-6 py-8">
    <!-- Header with Create Button -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">My Travel Plans</h1>
        <a href="{{ route('custom-travel-plan.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
            </svg>
            Create New Plan
        </a>
    </div>

    <!-- Plans List -->
    @if($travelPlans->count() > 0)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <ul class="divide-y divide-gray-200">
                @foreach($travelPlans as $plan)
                <li class="p-6 hover:bg-gray-50 transition duration-150">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">{{ $plan->destination }}</h3>
                            <div class="mt-2 flex flex-wrap gap-4 text-sm text-gray-600">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $plan->travel_dates }}
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    ${{ number_format($plan->budget, 2) }}
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    {{ $plan->travelers ?? 1 }} traveler(s)
                                </div>
                            </div>
                            @if($plan->activities)
                            <div class="mt-3">
                                <span class="text-sm font-medium text-gray-500">Activities:</span>
                                <div class="flex flex-wrap gap-2 mt-1">
                                    @foreach($plan->activities as $activity)
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">
                                        {{ $activity }}
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="flex space-x-2">
                            {{-- <a href="{{ route('travel-plans.show', $plan->id) }}" 
                               class="text-blue-600 hover:text-blue-800 px-3 py-1 rounded-lg border border-blue-200 hover:border-blue-300 transition">
                                View
                            </a> --}}
                            <form action="{{ route('travel-plans.destroy', $plan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 px-3 py-1 rounded-lg border border-red-200 hover:border-red-300 transition"
                                        onclick="return confirm('Are you sure you want to delete this plan?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $travelPlans->links() }}
        </div>
    @else
        <div class="bg-white shadow-lg rounded-lg p-8 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">No travel plans yet</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating your first custom travel plan.</p>
            <div class="mt-6">
                <a href="{{ route('custom-travel-plan.create') }}" 
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Create Travel Plan
                </a>
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Confirm before deletion
        const deleteForms = document.querySelectorAll('form[action*="travel-plans"]');
        
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('Are you sure you want to delete this travel plan?')) {
                    e.preventDefault();
                }
            });
        });
    });
</script>
@endpush