<?php

namespace App\Core;

class Theme
{
    /**
     * Variables
     *
     * @var bool
     */

    public static $htmlAttributes = [];
    public static $htmlClasses = [];

    /**
     * Keep page level assets
     *
     * @var array
     */
    public static $javascriptFiles = [];
    public static $cssFiles = [];
    public static $vendorFiles = [];


    /**
     * Get the global assets
     *
     * @return array
     */
    function getGlobalAssets($type = 'js')
    {
        return array_map(function ($path) {
            return $path;
        }, config('settings.THEME_ASSETS.global.' . $type));
    }

    /**
     * Add multiple vendors to the page by name. Refer to settings KT_THEME_VENDORS
     *
     * @param $vendors
     *
     * @return array
     */
    function addVendors($vendors)
    {
        foreach ($vendors as $value) {
            self::$vendorFiles[] = $value;
        }

        return array_unique(self::$vendorFiles);
    }

    /**
     * Add single vendor to the page by name. Refer to settings KT_THEME_VENDORS
     *
     * @param $vendor
     *
     * @return void
     */
    function addVendor($vendor)
    {
        self::$vendorFiles[] = $vendor;
    }

    /**
     * Get vendor files from settings. Refer to settings THEME_VENDORS
     *
     * @param $type
     *
     * @return array
     */
    function getVendors($type)
    {
        $files = [];
        foreach (self::$vendorFiles as $vendor) {
            $vendors = config('settings.THEME_VENDORS.' . $vendor);
            if (isset($vendors[$type])) {
                foreach ($vendors[$type] as $path) {
                    $files[] = $path;
                }
            }
        }

        return array_unique($files);
    }

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
        self::$htmlClasses[$scope][] = $value;
    }

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
        $key = array_search($value, self::$htmlClasses[$scope]);
        unset(self::$htmlClasses[$scope][$key]);
    }

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
        if (empty(self::$htmlClasses)) {
            return '';
        }

        $classes = [];
        if (isset(self::$htmlClasses[$scope])) {
            $classes = self::$htmlClasses[$scope];
        }

        if ($full) {
            return sprintf('class="%s"', implode(' ', (array) $classes));
        }

        return $classes;
    }

    /**
     * Print HTML attributes for the HTML template
     *
     * @param $scope
     *
     * @return string
     */
    function printHtmlAttributes($scope)
    {
        $attributes = [];
        if (isset(self::$htmlAttributes[$scope])) {
            foreach (self::$htmlAttributes[$scope] as $key => $value) {
                $attributes[] = sprintf('%s="%s"', $key, $value);
            }
        }

        return join(' ', $attributes);
    }

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
        self::$htmlAttributes[$scope][$name] = $value;
    }

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
        foreach ($attributes as $key => $value) {
            self::$htmlAttributes[$scope][$key] = $value;
        }
    }

    /**
     * Get HTML attribute based on the scope
     *
     * @param $scope
     * @param $attribute
     *
     * @return array
     */
    function getHtmlAttribute($scope, $attribute)
    {
        return self::$htmlAttributes[$scope][$attribute] ?? [];
    }

    /**
     * Add custom javascript file to the page
     *
     * @param $file
     *
     * @return void
     */
    function addJavascriptFile($file)
    {
        self::$javascriptFiles[] = $file;
    }

    /**
     * Get custom js files from the settings
     *
     * @return array
     */
    function getCustomJs()
    {
        return self::$javascriptFiles;
    }

    /**
     * Add custom CSS file to the page
     *
     * @param $file
     *
     * @return void
     */
    function addCssFile($file)
    {
        self::$cssFiles[] = $file;
    }

    /**
     * Get custom css files from the settings
     *
     * @return array
     */
    function getCustomCss()
    {
        return self::$cssFiles;
    }
}
