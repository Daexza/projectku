<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::all(); // Fetch all accommodations
        return view('admin.accommodation.index', compact('accommodations'));
    }

    public function create()
    {
        return view('admin.accommodation.create'); // Return the view for creating accommodations
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Create a new accommodation
        Accommodation::create($request->all());

        // Redirect to the accommodations index page with a success message
        return redirect()->route('admin.accommodation.index')->with('success', 'Accommodation created successfully.');
    }

    // Add other methods like edit, update, and destroy as needed
}