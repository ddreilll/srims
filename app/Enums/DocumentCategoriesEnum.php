<?php

namespace App\Enums;

class DocumentCategoriesEnum
{
    const ENTRANCE = 'ENTRANCE';
    const RECORDS = 'RECORDS';
    const EXIT = 'EXIT';

    public function getDisplayNames(): array
    {
        return [
            self::ENTRANCE => 'Entrance',
            self::RECORDS => 'Records',
            self::EXIT => 'Exit',
        ];
    }
}
