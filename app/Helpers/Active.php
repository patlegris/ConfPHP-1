<?php

namespace App\Helpers;
use Route;

class Active {
    public function check($segment1, $segment2 = null) {
        $segments = Route::getCurrentRequest()->segments();
        $countSegments = count($segments) - 1;

        if ($countSegments >= 0) {
            $firstSegment = $segments[0];
            $lastSegment = $segments[$countSegments];

            return ($segment1 == $firstSegment && (!$segment2 || $segment2 == $lastSegment)) ? 'active' : '';
        }

        if (empty($segment1)) return 'active';

        return '';
    }
}