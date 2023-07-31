<?php

namespace App\Enums;

class RecordTypeEnum
{
    const NONSIS = 'NONSIS';
    const SIS = 'SIS';

    public static function getDisplayNames(): array
    {
        return [
            self::NONSIS => 'Non-SIS',
            self::SIS => 'SIS',
        ];
    }
}
