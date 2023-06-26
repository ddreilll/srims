<?php

namespace App\Enums;

class StudentPreviousSchoolsTypeEnum
{
    const PRIMARY = 'PRIMARY';
    const SECONDARY = 'SECONDARY';
    const TERTIARY = 'TERTIARY';

    public static function getDisplayNames(): array
    {
        return [
            self::PRIMARY => 'Elementary',
            self::SECONDARY => 'High School, Junior High School or SHS',
            self::TERTIARY => 'College or University',
        ];
    }
}
