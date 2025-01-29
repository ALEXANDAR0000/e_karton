<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $doctors = Doctor::all();
    return response()->json([
        'success' => true,
        'data' => $doctors
    ], 200);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Display form for creating a doctor'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'required|string|max:255',
            'email'           => 'required|email|unique:doctors,email',
            'password'        => 'required|string|min:8',
            'doctor_type_id'  => 'required|exists:doctor_types,id',
        ]);

        $doctor = Doctor::create($validated);

        return response()->json($doctor, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return response()->json($doctor, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return response()->json([
            'message' => 'Display form for editing a doctor',
            'doctor'  => $doctor
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name'     => 'sometimes|string|max:255',
            'last_name'      => 'sometimes|string|max:255',
            'email'          => 'sometimes|email|unique:doctors,email,' . $id,
            'password'       => 'sometimes|string|min:8',
            'doctor_type_id' => 'sometimes|exists:doctor_types,id',
        ]);

        $doctor = Doctor::findOrFail($id);
        $doctor->update($validated);

        return response()->json($doctor, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return response()->json(null, 204);
    }
}
