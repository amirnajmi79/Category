<?php

namespace AmirNajmi\Category\Facades;

use Illuminate\Support\Facades\Facade;

class Category extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'category';
    }
}
