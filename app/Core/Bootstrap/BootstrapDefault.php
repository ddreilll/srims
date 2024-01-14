<?php

namespace App\Core\Bootstrap;

class BootstrapDefault
{
    public function init()
    {
        addVendors(['datatables']);
        addHtmlClass('container', 'container-fluid');
    }
}
