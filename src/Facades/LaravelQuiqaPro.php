<?php

namespace Shengamo\LaravelQuiqaPro\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelQuiqaPro extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-quiqa-pro';
    }
}
