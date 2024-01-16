<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'file_path',
        'course_name',
        'description',
        'duration',
    ];

    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class);
    }
}
