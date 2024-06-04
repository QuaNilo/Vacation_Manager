<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \App\Helpers\Setting
 */
class Setting extends Facade
{
    protected static function getFacadeAccessor() : string
    {
        return 'setting';
    }
}
