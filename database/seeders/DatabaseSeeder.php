<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Postojeći testni user
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Ostatak seed logike
        \App\Models\DoctorType::factory(5)->create();
        \App\Models\AppointmentType::factory(5)->create();

        \App\Models\Patient::factory(10)->create();
        \App\Models\Doctor::factory(10)->create();

        \App\Models\Appointment::factory(20)->create();
    }
}
?>