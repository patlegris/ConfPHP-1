<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class MyHtmlFacade extends Facade {

    protected static function getFacadeAccessor() {
        return 'myhtml';
    }
}