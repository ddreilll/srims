<?php

namespace App\Enums;

class AcademicStatusEnum
{
    const UNDERGRADUATE = 'UNG';
    const LOA = 'LOA';
    const DIS = 'DIS';
    const UNK = 'UNK';
    const RETURNEE = 'RTN';
    const GRADUATED = 'GRD';

    public static function getDisplayNames(): array
    {
        return [
            self::UNDERGRADUATE => 'Undergraduate',
            self::LOA => 'Leave of Absence',
            self::DIS => 'Dismissed',
            self::UNK => 'Unknown',
            self::RETURNEE => 'Returnee',
            self::GRADUATED => 'Graduated',
        ];
    }

    public static function getSelectable(): array
    {
        return [
            self::UNDERGRADUATE => 'Undergraduate',
            self::RETURNEE => 'Returnee',
            self::GRADUATED => 'Graduated',
            self::UNK => 'Unknown',
        ];
    }
}
