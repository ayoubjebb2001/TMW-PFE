<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['specialization'];

    /**
     * Get the user that owns the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the Modules for the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }
}
