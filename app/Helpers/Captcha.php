<?php

namespace App\Helpers;

use Session;

class Captcha {

    public function generate() {
        Session::set('number1', $this->getRandom());
        Session::set('number2', $this->getRandom());

        return Session::get('number1') . ' + ' . Session::get('number2');
    }

    public function operate() {
        return Session::get('number1') + Session::get('number2');
    }

    private function getRandom() {
        return rand(1, 10);
    }
}