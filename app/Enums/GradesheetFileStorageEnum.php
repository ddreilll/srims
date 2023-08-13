<?php

namespace App\Enums;

class GradesheetFileStorageEnum
{
    const LOCAL = 'LOCAL';
    const ONLINE = 'ONLINE';

    public static function getDisplayNames(): array
    {
        return [
            self::LOCAL => 'Local Storage',
            self::ONLINE => 'Cloud Storage',
        ];
    }
}
