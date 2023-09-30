<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projeto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['titulo','resumo','aluno_id'];

    public function user() {
        return $this->belongsTo('\App\Models\User');
    }
}
