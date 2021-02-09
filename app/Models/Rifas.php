<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rifas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rifas';

    /**
     * @var string[]
     */
    protected $fillable = [
        'nome',
        'descricao',
        'numeros',
        'video_url',
        'imagem_url',
        'status',
    ];

    public function valores()
    {
        return $this->hasMany(Valores::class, 'rifa_id');
    }
}
