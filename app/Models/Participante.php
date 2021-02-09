<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rifa_participantes';

    /**
     * @var string[]
     */
    protected $fillable = [
        'rifa_valores_id',
        'nome_completo',
        'email',
        'status',
    ];

    public function valor()
    {
        return $this->hasOne(Valores::class);
    }
}
