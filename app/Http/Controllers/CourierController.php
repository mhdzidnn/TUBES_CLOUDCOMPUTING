<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    // Method to create a new courier
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'abbreviation' => 'required|string|max:10',
        ]);

        // Create the courier
        $courier = Courier::create([
            'name' => $request->name,
            'abbreviation' => $request->abbreviation,
        ]);

        // Return the newly created courier as a JSON response
        return response()->json($courier, 201);
    }

    // Method to get all couriers
    public function index()
    {
        $couriers = Courier::all();
        return response()->json($couriers, 200);
    }

    // Method to get a single courier by ID
    public function show($id)
    {
        $courier = Courier::findOrFail($id);
        return response()->json($courier, 200);
    }

    // Method to delete a courier by ID
    public function destroy($id)
    {
        $courier = Courier::findOrFail($id);
        $courier->delete();
        return response()->json(null, 204);
    }
}
