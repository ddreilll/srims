<?php

namespace App\Enums;

class AdmissionMonthsEnum
{
    const JANUARY = '01';
    const FEBRUARY = '02';
    const MARCH = '03';
    const APRIL = '04';
    const MAY = '05';
    const JUNE = '06';
    const JULY = '07';
    const AUGUST = '08';
    const SEPTEMBER = '09';
    const OCTOBER = '10';
    const NOVEMBER = '11';
    const DECEMBER = '12';

    public static function getDisplayNames(): array
    {
        return [
            self::JANUARY => 'January',
            self::FEBRUARY => 'February',
            self::MARCH => 'March',
            self::APRIL => 'April',
            self::MAY => 'May',
            self::JUNE => 'June',
            self::JULY => 'July',
            self::AUGUST => 'August',
            self::SEPTEMBER => 'September',
            self::OCTOBER => 'October',
            self::NOVEMBER => 'November',
            self::DECEMBER => 'December',
        ];
    }
}
