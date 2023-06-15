<?php

namespace App\CustomFacade;

class Invoice
{
    public function dateFormat()
    {
        return 'ABC PRIVATE LIMITED';
    }

    public function currentDate()
    {
        return date('d-m-Y');
    }
}
