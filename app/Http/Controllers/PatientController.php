<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Return all patients as JSON
        return response()->json(Patient::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     * (Useful if you are returning a Blade view; for APIs, just return JSON or skip.)
     */
    public function create()
    {
        return response()->json(['message' => 'Display form for creating a patient'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:patients,email',
            'password'   => 'required|string|min:8',
            'gender'     => 'required|in:male,female',
        ]);

        // Create the new patient
        $patient = Patient::create($validated);

        // Return the newly created patient
        return response()->json($patient, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch patient or fail with 404
        $patient = Patient::findOrFail($id);
        return response()->json($patient, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Typically returns a view, but here we'll just return JSON for demonstration
        $patient = Patient::findOrFail($id);
        return response()->json([
            'message' => 'Display form for editing a patient',
            'patient' => $patient
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate data; "sometimes" lets fields be optional
        $validated = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name'  => 'sometimes|string|max:255',
            'email'      => 'sometimes|email|unique:patients,email,' . $id,
            'password'   => 'sometimes|string|min:8',
            'gender'     => 'sometimes|in:male,female',
        ]);

        // Find and update the patient
        $patient = Patient::findOrFail($id);
        $patient->update($validated);

        return response()->json($patient, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return response()->json(null, 204);
    }
}
