<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ZohoClientFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'zoho-client'; // ключ, під яким зареєстровано ZohoClient у контейнері залежностей
    }
}
