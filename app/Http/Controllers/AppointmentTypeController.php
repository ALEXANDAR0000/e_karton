<?php

namespace App\Http\Controllers;

use App\Models\AppointmentType;
use Illuminate\Http\Request;

class AppointmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(AppointmentType::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Display form for creating an appointment type'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'sometimes|nullable|string',
        ]);

        $appointmentType = AppointmentType::create($validated);

        return response()->json($appointmentType, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $appointmentType = AppointmentType::findOrFail($id);
        return response()->json($appointmentType, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $appointmentType = AppointmentType::findOrFail($id);
        return response()->json([
            'message'         => 'Display form for editing an appointment type',
            'appointmentType' => $appointmentType
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'        => 'sometimes|string|max:255',
            'description' => 'sometimes|nullable|string',
        ]);

        $appointmentType = AppointmentType::findOrFail($id);
        $appointmentType->update($validated);

        return response()->json($appointmentType, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointmentType = AppointmentType::findOrFail($id);
        $appointmentType->delete();

        return response()->json(null, 204);
    }
}
