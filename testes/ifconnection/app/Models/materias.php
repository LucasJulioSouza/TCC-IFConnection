<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materias extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function professores()
    {
        return $this->belongsToMany(User::class, 'materias_professor', 'materia_id', 'user_id');
    }
}
