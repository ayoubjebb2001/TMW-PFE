<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'filiere_id',
        'module_name',
        'description',
        'duration',
    ];

    public function filieres(): BelongsToMany
    {
        return $this->belongsToMany(Filiere::class);
    }
}
