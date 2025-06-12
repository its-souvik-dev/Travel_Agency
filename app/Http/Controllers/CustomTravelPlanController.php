<?php

namespace App\Http\Controllers;

use App\Models\TravelPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomTravelPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travelPlans = auth()->user()->travelPlans()
            ->latest()
            ->paginate(10);

        return view('travel-plans.index', compact('travelPlans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destinations = [
            'Paris, France',
            'Tokyo, Japan',
            'Bali, Indonesia',
            'New York, USA',
            'Rome, Italy',
            'Sydney, Australia',
            'Cape Town, South Africa'
        ];

        $activities = [
            'Sightseeing',
            'Hiking',
            'Beach',
            'Museums',
            'Shopping',
            'Food Tours',
            'Adventure Sports',
            'Cultural Experiences',
            'Nightlife',
            'Relaxation'
        ];

        // Get user's saved plans if authenticated
        $userPlans = auth()->check() ? auth()->user()->travelPlans()->latest()->get() : collect();

        return view('custom-travel-plan', compact('destinations', 'activities', 'userPlans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination' => 'required|string|max:255',
            'travel_dates' => 'required|string|max:255',
            'budget' => 'required|numeric|min:0',
            'travelers' => 'required|integer|min:1|max:20',
            'activities' => 'nullable|array',
            'activities.*' => 'string|max:255'
        ]);

        $travelPlan = Auth::user()->travelPlans()->create([
            'destination' => $validated['destination'],
            'travel_dates' => $validated['travel_dates'],
            'budget' => $validated['budget'],
            'activities' => $validated['activities'] ?? null,
            'travelers' => $validated['travelers']
        ]);

        return redirect()->back()->with('success', 'Your custom travel plan has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TravelPlan $travelPlan)
    {
        return view('travel-plans.show', compact('travelPlan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TravelPlan $travelPlan)
    {
        // Authorization check
        $this->authorize('delete', $travelPlan);

        // Delete the plan
        $travelPlan->delete();

        // Redirect with success message
        return redirect()->route('travel-plans.index')
            ->with('success', 'Travel plan deleted successfully');
    }
}
