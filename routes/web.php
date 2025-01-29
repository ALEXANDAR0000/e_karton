<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorTypeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentTypeController;

// Default welcome route
Route::get('/', function () {
    return view('welcome');
});

// Patients Routes
Route::prefix('patients')->group(function () {
    Route::get('/', [PatientController::class, 'index'])->name('patients.index'); // List all patients
    Route::get('/create', [PatientController::class, 'create'])->name('patients.create'); // Show create form
    Route::post('/', [PatientController::class, 'store'])->name('patients.store'); // Store a new patient
    Route::get('/{id}', [PatientController::class, 'show'])->name('patients.show'); // Show a specific patient
    Route::get('/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit'); // Show edit form
    Route::put('/{id}', [PatientController::class, 'update'])->name('patients.update'); // Update a patient
    Route::delete('/{id}', [PatientController::class, 'destroy'])->name('patients.destroy'); // Delete a patient
});

// Doctors Routes
Route::prefix('doctors')->group(function () {
    Route::get('/', [DoctorController::class, 'index'])->name('doctors.index'); // List all doctors
    Route::get('/create', [DoctorController::class, 'create'])->name('doctors.create'); // Show create form
    Route::post('/', [DoctorController::class, 'store'])->name('doctors.store'); // Store a new doctor
    Route::get('/{id}', [DoctorController::class, 'show'])->name('doctors.show'); // Show a specific doctor
    Route::get('/{id}/edit', [DoctorController::class, 'edit'])->name('doctors.edit'); // Show edit form
    Route::put('/{id}', [DoctorController::class, 'update'])->name('doctors.update'); // Update a doctor
    Route::delete('/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy'); // Delete a doctor
});

// Doctor Types Routes
Route::prefix('doctor-types')->group(function () {
    Route::get('/', [DoctorTypeController::class, 'index'])->name('doctor-types.index'); // List all doctor types
    Route::get('/create', [DoctorTypeController::class, 'create'])->name('doctor-types.create'); // Show create form
    Route::post('/', [DoctorTypeController::class, 'store'])->name('doctor-types.store'); // Store a new doctor type
    Route::get('/{id}', [DoctorTypeController::class, 'show'])->name('doctor-types.show'); // Show a specific doctor type
    Route::get('/{id}/edit', [DoctorTypeController::class, 'edit'])->name('doctor-types.edit'); // Show edit form
    Route::put('/{id}', [DoctorTypeController::class, 'update'])->name('doctor-types.update'); // Update a doctor type
    Route::delete('/{id}', [DoctorTypeController::class, 'destroy'])->name('doctor-types.destroy'); // Delete a doctor type
});

// Appointments Routes
Route::prefix('appointments')->group(function () {
    Route::get('/', [AppointmentController::class, 'index'])->name('appointments.index'); // List all appointments
    Route::get('/create', [AppointmentController::class, 'create'])->name('appointments.create'); // Show create form
    Route::post('/', [AppointmentController::class, 'store'])->name('appointments.store'); // Store a new appointment
    Route::get('/{id}', [AppointmentController::class, 'show'])->name('appointments.show'); // Show a specific appointment
    Route::get('/{id}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit'); // Show edit form
    Route::put('/{id}', [AppointmentController::class, 'update'])->name('appointments.update'); // Update an appointment
    Route::delete('/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy'); // Delete an appointment
});

// Appointment Types Routes
Route::prefix('appointment-types')->group(function () {
    Route::get('/', [AppointmentTypeController::class, 'index'])->name('appointment-types.index'); // List all appointment types
    Route::get('/create', [AppointmentTypeController::class, 'create'])->name('appointment-types.create'); // Show create form
    Route::post('/', [AppointmentTypeController::class, 'store'])->name('appointment-types.store'); // Store a new appointment type
    Route::get('/{id}', [AppointmentTypeController::class, 'show'])->name('appointment-types.show'); // Show a specific appointment type
    Route::get('/{id}/edit', [AppointmentTypeController::class, 'edit'])->name('appointment-types.edit'); // Show edit form
    Route::put('/{id}', [AppointmentTypeController::class, 'update'])->name('appointment-types.update'); // Update an appointment type
    Route::delete('/{id}', [AppointmentTypeController::class, 'destroy'])->name('appointment-types.destroy'); // Delete an appointment type
});