<?php

namespace App\Helpers;

class Captcha {
    private $a, $b;

    public function generate() {
        $this->a = $this->getRandom();
        $this->b = $this->getRandom();
    }

    public function check($somme) {
        return ($somme == $this->a + $this->b);
    }

    private function getRandom() {
        return rand(1, 10);
    }
}