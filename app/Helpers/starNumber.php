<?php
if (!function_exists('starNumber')) {
    function starNumber($score)
    {
        $star = '<img src="' . asset(config('constant.icon.link_star')) . '" width="40">';
        if ($score < config('constant.stars.1_star')) {
            return '';
        } elseif ($score <= config('constant.stars.2_star')) {
            return $star;
        } elseif ($score <= config('constant.stars.3_star')) {
            return $star . $star;
        } elseif ($score <= config('constant.stars.4_star')) {
            return $star . $star . $star;
        } elseif ($score < config('constant.stars.5_star')) {
            return $star . $star . $star . $star;
        } elseif ($score = config('constant.stars.5_star')) {
            return $star . $star . $star . $star . $star;
        }
    }
}
