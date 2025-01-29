<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Relationships
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}

?>