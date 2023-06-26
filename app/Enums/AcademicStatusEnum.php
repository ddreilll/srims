<?php

namespace App\Enums;

class AcademicStatusEnum
{
    const UNDERGRADUATE = 'UNG';
    const RETURNEE = 'RTN';
    const DISMISSED = 'DIS';
    const GRADUATED = 'GRD';

    public static function getDisplayNames(): array
    {
        return [
            self::UNDERGRADUATE => 'Undergraduate',
            self::RETURNEE => 'Returnee',
            self::DISMISSED => 'Dismissed',
            self::GRADUATED => 'Graduated',
        ];
    }
}
