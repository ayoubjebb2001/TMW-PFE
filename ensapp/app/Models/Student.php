<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the inscription that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function inscription() :HasOne
    {
        return $this->hasOne(Inscription::class);
    }
}
