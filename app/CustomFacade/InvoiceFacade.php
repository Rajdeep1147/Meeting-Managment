<?php

namespace App\CustomFacade;

use Illuminate\Support\Facades\Facade;

class InvoiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {

        return 'Invoice';
    }
}
