<?php

namespace App\Enums;

class StatusEnum
{
    public const PENDENTE = 'pendente';
    public const PAGO = 'pago';
    public const ATIVO = 'ativo';
    public const INATIVO = 'inativo';

    public static function getRifaStatus(): array
    {
        return [
            self::ATIVO => ucfirst(self::ATIVO),
            self::INATIVO => ucfirst(self::INATIVO),
        ];
    }
}
