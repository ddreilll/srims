<?php

use Illuminate\Support\Str;


if (!function_exists('formatDatetime')) {

    /**
     * Format datetime
     *
     * @param int $timestamp Time timestamp parameter is an integer Unix timerstamp
     */

    function formatDatetime($timestamp)
    {
        // Get configuration from db

        return date('m/d/Y h:i:s A', strtotime($timestamp));
    }
}

if (!function_exists('pluralized')) {

    function pluralized($word, $size)
    {
        return ($size > 1) ? sprintf('%ss', $word) : $word;
    }
}

if (!function_exists('format_datetime')) {

    /**
     * Format datetime
     *
     * @param int $timestamp Time timestamp parameter is an integer Unix timerstamp
     */

    function format_datetime($timestamp)
    {
        // Get configuration from db

        return date('m/d/Y h:i:s A', $timestamp);
    }
}

if (!function_exists('axios_timeout')) {
    function axios_timeout()
    {
        return 15000;
    }
}

if (!function_exists('get_day_list')) {

    function get_day_list()
    {

        return [
            [
                'value' => "M",
                'text' => "Monday",
            ],
            [
                'value' => "T",
                'text' => "Tuesday",
            ],
            [
                'value' => "W",
                'text' => "Wednesday",
            ],
            [
                'value' => "TH",
                'text' => "Thursday",
            ],
            [
                'value' => "F",
                'text' => "Friday",
            ],
            [
                'value' => "SAT",
                'text' => "Saturday",
            ],
            [
                'value' => "SUN",
                'text' => "Sunday",
            ],
        ];
    }
}

if (!function_exists('format_name')) {

    /**
     * Name Formatter
     *
     * @param integer $type FORMAT TYPE ― 1 = ex. "Prof. Juan D. Dela Cruz Jr." | 2 = ex. "Dela Cruz Jr., Juan Deguzman"
     * @param string $prefix NAME PREFIX ― ex. ["Prof.", "Dr.", "Mr."]
     * @param string $first FIRST NAME
     * @param string $middle MIDDLE NAME
     * @param string $last LAST NAME
     * @param string $suffix NAME SUFFIX ― ex. ["Jr.", "Sr.", "III"]
     */

    function format_name($type = 1, $prefix = null, $first = null, $middle = null, $last = null, $suffix = null)
    {
        $formatted_name = "";
        switch ($type) {
            case '1':
                $formatted_name = (($prefix) ? $prefix . " " : "") . $first . " " . (($middle) ? Str::of($middle)->substr(0, 1) . ". " : "") . $last . " " . (($suffix) ? $suffix . " " : "");
                break;

            case '2':
                $formatted_name = $last . (($suffix) ?  " " . $suffix . " " : "") . ", " . $first . " " . $middle;
                break;

            case '3':

                $formatted_name = $first . " " . (($middle) ? Str::of($middle)->substr(0, 1) . ". " : "") . $last;
                break;
        }

        return $formatted_name;
    }
}

if (!function_exists('get_record_status')) {

    function get_record_status_list()
    {

        return [
            [
                'value' => 'DRAFT',
                'display' => 'Draft'

            ],
            [
                'value' => 'SUBMITTED',
                'display' => 'Submitted'
            ],
            [
                'value' => 'FOR_VALIDATION',
                'display' => 'For Validation'
            ],
            [
                'value' => 'PARTIALLY_VALIDATED',
                'display' => 'Partially Validated'
            ],
            [
                'value' => 'VALIDATED',
                'display' => 'Validated'
            ]
        ];
    }
}

if (!function_exists('get_grading_list')) {

    function get_grading_list()
    {

        return [
            [
                'value' => '1.00',
            ],
            [
                'value' => '1.25',
            ],
            [
                'value' => '1.50',
            ],
            [
                'value' => '1.75',
            ],
            [
                'value' => '2.00',
            ],
            [
                'value' => '2.25',
            ],
            [
                'value' => '2.50',
            ],
            [
                'value' => '2.75',
            ],
            [
                'value' => '3.00',
            ],
            [
                'value' => '4.00',
            ],
            [
                'value' => '5.00',
            ],
            [
                'value' => "W",
            ],
            [
                'value' => "D",
            ],
            [
                'value' => "INC",
            ],
        ];
    }
}

if (!function_exists('get_final_rating_list')) {

    function get_final_rating_list()
    {

        return [
            [
                'value' => '1.00',
            ],
            [
                'value' => '1.25',
            ],
            [
                'value' => '1.50',
            ],
            [
                'value' => '1.75',
            ],
            [
                'value' => '2.00',
            ],
            [
                'value' => '2.25',
            ],
            [
                'value' => '2.50',
            ],
            [
                'value' => '2.75',
            ],
            [
                'value' => '3.00',
            ],
            [
                'value' => '4.00',
            ],
            [
                'value' => '5.00',
            ],
            [
                'value' => "W",
            ],
            [
                'value' => "D",
            ],
            [
                'value' => "INC",
            ],
            [
                'value' => "1.0/INC",
            ],
            [
                'value' => "1.25/INC",
            ],
            [
                'value' => "1.50/INC",
            ],
            [
                'value' => "1.75/INC",
            ],
            [
                'value' => "2.00/INC",
            ],
            [
                'value' => "2.25/INC",
            ],
            [
                'value' => "2.50/INC",
            ],
            [
                'value' => "2.75/INC",
            ],
            [
                'value' => "3.00/INC",
            ],
            [
                'value' => "5.00/INC",
            ]
        ];
    }
}

if (!function_exists('get_grading_status_list')) {

    function get_grading_status_list()
    {

        return [
            [
                'value' => "P",
            ],
            [
                'value' => "W",
            ],
            [
                'value' => "D",
            ]
        ];
    }
}

if (!function_exists('maskEmail')) {
    function maskEmail($email)
    {
        $parts = explode('@', $email);
        $username = $parts[0];
        $domain = $parts[1];

        $usernameLength = strlen($username);
        $maskedUsername = substr($username, 0, 2) . str_repeat('*', $usernameLength - 4) . substr($username, -2);

        return $maskedUsername . '@' . $domain;
    }
}

if (!function_exists('convertToSnakeCase')) {

    function convertToSnakeCase($string)
    {
        // Replace spaces with underscores
        $string = str_replace(' ', '_', $string);

        // Convert to lowercase
        $string = strtolower($string);

        return $string;
    }
}
