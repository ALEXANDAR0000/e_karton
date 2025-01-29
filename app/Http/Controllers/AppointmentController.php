<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Optionally: Eager load related patient, doctor, or appointmentType
        // return response()->json(Appointment::with(['patient', 'doctor', 'appointmentType'])->get(), 200);
        return response()->json(Appointment::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'Display form for creating an appointment'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id'        => 'required|exists:patients,id',
            'doctor_id'         => 'required|exists:doctors,id',
            'appointment_time'  => 'required|date',
            'status'            => 'required|in:pending,approved,rejected,completed,canceled',
            'type_id'           => 'required|exists:appointment_types,id',
            'comment'           => 'sometimes|nullable|string',
        ]);

        $appointment = Appointment::create($validated);

        return response()->json($appointment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Eager load relationships if needed
        $appointment = Appointment::with(['patient', 'doctor', 'appointmentType'])->findOrFail($id);
        return response()->json($appointment, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return response()->json([
            'message'     => 'Display form for editing an appointment',
            'appointment' => $appointment
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'patient_id'        => 'sometimes|exists:patients,id',
            'doctor_id'         => 'sometimes|exists:doctors,id',
            'appointment_time'  => 'sometimes|date',
            'status'            => 'sometimes|in:pending,approved,rejected,completed,canceled',
            'type_id'           => 'sometimes|exists:appointment_types,id',
            'comment'           => 'sometimes|nullable|string',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($validated);

        return response()->json($appointment, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return response()->json(null, 204);
    }
}
