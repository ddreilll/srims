<?php

namespace App\Enums;

class AdmissionStatusEnum
{
    const FRESHMEN = 'FRESHMEN';
    const TRANSFEREE = 'TRANSFEREE';
    const LADDERIZED = 'LADDERIZED';

    public static function getDisplayNames(): array
    {
        return [
            self::FRESHMEN => 'Freshmen',
            self::TRANSFEREE => 'Transferee',
            self::LADDERIZED => 'Ladderized',
        ];
    }
}
