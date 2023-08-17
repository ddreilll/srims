<?php

return [
    'date_format'         => 'Y-m-d',
    'time_format'         => 'H:i:s',
    'primary_language'    => 'en',
    'available_languages' => [
        'en' => 'English',
    ],
    "2fa" => 'off',
    "email_verified" => 'on',
    'password' =>
    [
        'min' => 6,
        'lowecase' => 'on',
        'uppercase' => 'on',
        'digits' => 'on',
        'special' => 'on',
    ],
    'registration' => 'on'
];
