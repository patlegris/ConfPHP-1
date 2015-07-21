<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ActiveFacade extends Facade {

    protected static function getFacadeAccessor() {
        return 'active';
    }
}