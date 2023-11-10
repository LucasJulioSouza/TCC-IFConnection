<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projeto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['titulo','resumo','user_id','foto'];

    public function user() {
        return $this->belongsTo('\App\Models\User');
    }

    public function orientacao()
    {
        return $this->hasOne(Orientacao::class, 'projeto_id');
    }
}
