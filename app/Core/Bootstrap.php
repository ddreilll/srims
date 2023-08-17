<?php

namespace App\Core;

class Bootstrap
{
    // Init theme mode option from settings
    public static function init()
    {
        addHtmlAttribute('body', 'id', 'kt_app_body');
        addVendors(['fontawesome-pro']);
    }
}
