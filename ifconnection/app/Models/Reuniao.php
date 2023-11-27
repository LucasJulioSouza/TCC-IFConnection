<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reuniao extends Model
{
    use SoftDeletes;

    protected $table = 'reunioes';
    protected $fillable = ['tema', 'link', 'ata', 'orientacao_id', 'data'];

    public function orientacao()
    {
        return $this->belongsTo(Orientacao::class);
    }
}
