<?php
/**
 * Created by PhpStorm.
 * User: soywod
 * Date: 19/07/15
 * Time: 01:03
 */

namespace App\Helpers;


class MyHtml {

    public function radio($name, $params = []) {
        $str_params = '';

        foreach ($params as $param => $value)
            $str_params .= $param . '="' . $value . '" ';

        return '<input type="radio" name="' . $name . '" ' . $str_params . '/>';
    }

    public function link($title, $href) {
        return '<a href="' . $href . '">' . $title . '</a>';
    }

    public function thumb($title, $href) {
        return '<a href="' . $href . '">' . $title . '</a>';
    }

}