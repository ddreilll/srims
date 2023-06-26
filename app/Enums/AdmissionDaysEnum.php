<?php

namespace App\Enums;

class AdmissionDaysEnum
{
    const ONE = '01';
    const TWO = '02';
    const THREE = '03';
    const FOUR = '04';
    const FIVE = '05';
    const SIX = '06';
    const SEVEN = '07';
    const EIGHT = '08';
    const NINE = '09';
    const TEN = '10';
    const ELEVEN = '11';
    const TWELVE = '12';
    const THIRTEEN = '13';
    const FOURTEEN = '14';
    const FIFTEEN = '15';
    const SIXTEEN = '16';
    const SEVENTEEN = '17';
    const EIGHTEEN = '18';
    const NINETEEN = '19';
    const TWENTY = '20';
    const TWENTYONE = '21';
    const TWENTYTWO = '22';
    const TWENTYTHREE = '23';
    const TWENTYFOUR = '24';
    const TWENTYFIVE = '25';
    const TWENTYSIX = '26';
    const TWENTYSEVEN = '27';
    const TWENTYEIGHT = '28';
    const TWENTYNINE = '29';
    const THIRTY = '30';
    const THIRTYONE = '31';

    public static function getDisplayNames(): array
    {
        return [
            self::ONE => '01',
            self::TWO => '02',
            self::THREE => '03',
            self::FOUR => '04',
            self::FIVE => '05',
            self::SIX => '06',
            self::SEVEN => '07',
            self::EIGHT => '08',
            self::NINE => '09',
            self::TEN => '10',
            self::ELEVEN => '11',
            self::TWELVE => '12',
            self::THIRTEEN => '13',
            self::FOURTEEN => '14',
            self::FIFTEEN => '15',
            self::SIXTEEN => '16',
            self::SEVENTEEN => '17',
            self::EIGHTEEN => '18',
            self::NINETEEN => '19',
            self::TWENTY => '20',
            self::TWENTYONE => '21',
            self::TWENTYTWO => '22',
            self::TWENTYTHREE => '23',
            self::TWENTYFOUR => '24',
            self::TWENTYFIVE => '25',
            self::TWENTYSIX => '26',
            self::TWENTYSEVEN => '27',
            self::TWENTYEIGHT => '28',
            self::TWENTYNINE => '29',
            self::THIRTY => '30',
            self::THIRTYONE => '31',
        ];
    }
}
