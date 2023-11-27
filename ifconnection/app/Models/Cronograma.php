<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cronograma extends Model
{
    use SoftDeletes;

    protected $table = 'cronogramas';
    protected $fillable = ['tarefa', 'orientacao_id', 'data'];

    public function orientacao()
    {
        return $this->belongsTo(Orientacao::class);
    }
}
