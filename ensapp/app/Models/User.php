<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['prenom', 'nom', 'phone', 'email', 'password'];
    
    /**
     * Relation with student
     */
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    /**
     * Relation with teacher
     */
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
}
