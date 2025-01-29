<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'doctor_type_id',
    ];

    protected $hidden = [
        'password',
    ];

    // Relationships
    public function doctorType()
    {
        return $this->belongsTo(DoctorType::class, 'doctor_type_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}

?>