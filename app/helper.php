<?php

use Illuminate\Support\Str;

if (!function_exists('axios_timeout')) {
    function axios_timeout()
    {
        return 15000;
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
                $formatted_name = $last . " " . (($suffix) ? $suffix . " " : "") . ", " . $first . " " . $middle;
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
                'value' => 1.00,
                'remarks' => "PASSED"
            ],
            [
                'value' => 1.25,
                'remarks' => "PASSED"
            ],
            [
                'value' => 1.50,
                'remarks' => "PASSED"
            ],
            [
                'value' => 1.75,
                'remarks' => "PASSED"
            ],
            [
                'value' => 2.00,
                'remarks' => "PASSED"
            ],
            [
                'value' => 2.25,
                'remarks' => "PASSED"
            ],
            [
                'value' => 2.50,
                'remarks' => "PASSED"
            ],
            [
                'value' => 2.75,
                'remarks' => "PASSED"
            ],
            [
                'value' => 3.00,
                'remarks' => "PASSED"
            ],
            [
                'value' => 5.00,
                'remarks' => "FAILED"
            ]
        ];
    }
}
