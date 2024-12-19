<?php

// app/Http/Controllers/AccommodationController.php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::all(); // Fetch all accommodations
        return view('accommodations.index', compact('accommodations')); // Return the view
    }

    public function create()
    {
        return view('accommodations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Accommodation::create($request->all());
        return redirect()->route('accommodations.index')->with('success', 'Accommodation added successfully.');
    }

    // Add other methods like edit, update, and destroy as needed
}