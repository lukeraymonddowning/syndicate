<?php

namespace LukeDowning\Syndicate\Facades;

use Illuminate\Support\Facades\Facade;

class Syndicate extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'syndicate';
    }
}
