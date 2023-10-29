<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orientacao extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'orientacoes';

    protected $fillable = [
        'professor_id',
        'aluno_id',
        'status',
        
    ];

    
    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    public function aluno()
    {
        return $this->belongsTo(User::class, 'aluno_id');
    }
}
