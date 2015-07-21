<?php

namespace App\Helpers;
use Route;

class Active {
    public function isActive($menu) {
        return Route::getCurrentRequest()->segment(1) == $menu;
    }
}