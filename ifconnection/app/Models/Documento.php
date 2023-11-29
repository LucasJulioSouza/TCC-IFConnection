<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes;

    protected $table = 'documentos';
    protected $fillable = ['nome', 'descricao', 'orientacao_id', 'documento', 'comentario' ];

    public function orientacao()
    {
        return $this->belongsTo(Orientacao::class);
    }


}
