<?php

namespace App\Enums;

class AcademicStatusEnum
{
    const UNDERGRADUATE = 'UNG';
    const LOA = 'LOA';
    const DIS = 'DIS';
    const REG = 'REG';
    const UNK = 'UNK';
    const RETURNEE = 'RTN';
    const GRADUATED = 'GRD';

    public static function getDisplayNames(): array
    {
        return [
            self::UNDERGRADUATE => 'Continuing',
            self::LOA => 'Leave of Absence',
            self::DIS => 'Dismissed',
            self::REG => 'Regular',
            self::UNK => 'Unknown',
            self::RETURNEE => 'Returnee',
            self::GRADUATED => 'Graduated',
        ];
    }
}
