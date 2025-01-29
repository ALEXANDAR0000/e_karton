<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Doctor;
use App\Models\DoctorType;

class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition()
    {
        return [
            'first_name'      => $this->faker->firstName(),
            'last_name'       => $this->faker->lastName(),
            'email'           => $this->faker->unique()->safeEmail(),
            'password'        => Hash::make('password'),
            // Automatski kreira i povezuje DoctorType ako ga ne proslediš ručno
            'doctor_type_id'  => DoctorType::factory(),
        ];
    }
}
