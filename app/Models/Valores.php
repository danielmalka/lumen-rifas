<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Valores extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rifa_valores';

    /**
     * @var string[]
     */
    protected $fillable = [
        'rifa_id',
        'valor_referente',
        'numero',
    ];

    public function rifa()
    {
        return $this->belongsTo(Rifas::class, 'rifa_id');
    }

    public function participante()
    {
        return $this->hasMany(Participante::class, 'rifa_valores_id');
    }
}
