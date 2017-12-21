<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Socket extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Services\Socket::class;
    }
}