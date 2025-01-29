<?php

namespace App\Http\Controllers;

use App\Models\DoctorType;
use Illuminate\Http\Request;

class DoctorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(DoctorType::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Display form for creating a doctor type'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $doctorType = DoctorType::create($validated);

        return response()->json($doctorType, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctorType = DoctorType::findOrFail($id);
        return response()->json($doctorType, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctorType = DoctorType::findOrFail($id);
        return response()->json([
            'message'    => 'Display form for editing a doctor type',
            'doctorType' => $doctorType
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
        ]);

        $doctorType = DoctorType::findOrFail($id);
        $doctorType->update($validated);

        return response()->json($doctorType, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctorType = DoctorType::findOrFail($id);
        $doctorType->delete();

        return response()->json(null, 204);
    }
}
