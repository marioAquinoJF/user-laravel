<?php
namespace Emiolo\User\Facade;

use Illuminate\Support\Facades\Facade;

class Route extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'emiolo_user_route';
    }

}