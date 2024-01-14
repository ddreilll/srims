<?php

use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

if (!function_exists('theme')) {
    function theme()
    {
        return app(App\Core\Theme::class);
    }
}

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

if (!function_exists('formatDate')) {

    /**
     * Format datetime
     *
     * @param int $timestamp Time timestamp parameter is an integer Unix timerstamp
     */

    function formatDate($timestamp)
    {
        // Get configuration from db

        return date('m/d/Y', strtotime($timestamp));
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

if (!function_exists('previousRoute')) {
    /**
     * Generate a route name for the previous request.
     *
     * @return string|null
     */
    function previousRoute()
    {
        $previousRequest = app('request')->create(app('url')->previous());

        try {
            $routeName = app('router')->getRoutes()->match($previousRequest)->getName();
        } catch (NotFoundHttpException $exception) {
            return null;
        }

        return $routeName;
    }
}

if (!function_exists('getAvatarPlaceholder')) {

    function getAvatarPlaceholder()
    {
        return asset('assets/media/avatar/avatar_main.jpg');
    }
}

if (!function_exists('strToArray')) {

    function strToArray($separator, $string)
    {
        if (!$string || $string == "") {
            return [];
        }

        return explode($separator, $string);
    }
}

// Themes
if (!function_exists('getGlobalAssets')) {
    /**
     * Get the global assets
     *
     * @param $type
     *
     * @return array
     */
    function getGlobalAssets($type = 'js')
    {
        return theme()->getGlobalAssets($type);
    }
}

if (!function_exists('addVendors')) {
    /**
     * Add multiple vendors to the page by name. Refer to settings KT_THEME_VENDORS
     *
     * @param $vendors
     *
     * @return void
     */
    function addVendors($vendors)
    {
        theme()->addVendors($vendors);
    }
}

if (!function_exists('addVendor')) {
    /**
     * Add single vendor to the page by name. Refer to settings KT_THEME_VENDORS
     *
     * @param $vendor
     *
     * @return void
     */
    function addVendor($vendor)
    {
        theme()->addVendor($vendor);
    }
}

if (!function_exists('getVendors')) {
    /**
     * Get vendor files from settings. Refer to settings KT_THEME_VENDORS
     *
     * @param $type
     *
     * @return array
     */
    function getVendors($type)
    {
        return theme()->getVendors($type);
    }
}

if (!function_exists('addHtmlClass')) {
    /**
     * Add HTML class by scope
     *
     * @param $scope
     * @param $value
     *
     * @return void
     */
    function addHtmlClass($scope, $value)
    {
        theme()->addHtmlClass($scope, $value);
    }
}

if (!function_exists('removeHtmlClass')) {
    /**
     * Remove HTML class by scope
     *
     * @param $scope
     * @param $value
     *
     * @return void
     */
    function removeHtmlClass($scope, $value)
    {
        theme()->removeHtmlClass($scope, $value);
    }
}

if (!function_exists('printHtmlClasses')) {
    /**
     * Print HTML classes for the HTML template
     *
     * @param $scope
     * @param $full
     *
     * @return string
     */
    function printHtmlClasses($scope, $full = true)
    {
        return theme()->printHtmlClasses($scope, $full);
    }
}

if (!function_exists('printHtmlAttributes')) {
    /**
     * Print HTML attributes for the HTML template
     *
     * @param $scope
     *
     * @return string
     */
    function printHtmlAttributes($scope)
    {
        return theme()->printHtmlAttributes($scope);
    }
}

if (!function_exists('addHtmlAttribute')) {
    /**
     * Add HTML attributes by scope
     *
     * @param $scope
     * @param $name
     * @param $value
     *
     * @return void
     */
    function addHtmlAttribute($scope, $name, $value)
    {
        theme()->addHtmlAttribute($scope, $name, $value);
    }
}

if (!function_exists('addHtmlAttributes')) {
    /**
     * Add multiple HTML attributes by scope
     *
     * @param $scope
     * @param $attributes
     *
     * @return void
     */
    function addHtmlAttributes($scope, $attributes)
    {
        theme()->addHtmlAttributes($scope, $attributes);
    }
}

if (!function_exists('addJavascriptFile')) {
    /**
     * Add custom javascript file to the page
     *
     * @param $file
     *
     * @return void
     */
    function addJavascriptFile($file)
    {
        theme()->addJavascriptFile($file);
    }
}

if (!function_exists('getCustomJs')) {
    /**
     * Get custom js files from the settings
     *
     * @return array
     */
    function getCustomJs()
    {
        return theme()->getCustomJs();
    }
}

if (!function_exists('addCssFile')) {
    /**
     * Add custom CSS file to the page
     *
     * @param $file
     *
     * @return void
     */
    function addCssFile($file)
    {
        theme()->addCssFile($file);
    }
}

if (!function_exists('getCustomCss')) {
    /**
     * Get custom css files from the settings
     *
     * @return array
     */
    function getCustomCss()
    {
        return theme()->getCustomCss();
    }
}
