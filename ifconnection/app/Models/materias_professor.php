<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materias_professor extends Model
{
    use HasFactory;

    protected $table = 'materias_professor';

    protected $fillable = ['user_id', 'materia_id'];

    public function professor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materia_id');
    }
}
