<?php
if (!function_exists('toMinutes')) {
    function toMinutes($seconds)
    {
        $minutes = floor($seconds / 60);
        $seconds = $seconds % 60;
        return $minutes . ' : ' . $seconds;
    }
}
