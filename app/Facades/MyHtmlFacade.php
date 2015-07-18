<?php
/**
 * Created by PhpStorm.
 * User: soywod
 * Date: 19/07/15
 * Time: 01:12
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class MyHtmlFacade extends Facade {

    protected static function getFacadeAccessor() {
        return 'MyHtml';
    }
}