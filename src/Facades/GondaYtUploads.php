<?php

namespace Rajagonda\GondaYtUploads\Facades;

use Illuminate\Support\Facades\Facade;

class GondaYtUploads extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'GondaYtUploads';
    }
}