<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \App\Helpers\HelperMethods
 */
class HelperMethods extends Facade
{
    protected static function getFacadeAccessor() : string
    {
        return 'helperMethods';
    }
}
