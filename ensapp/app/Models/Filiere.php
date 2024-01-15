<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'filiere_name',
        'description',
        'capacity',
    ];

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }
}
