<?php
if (!function_exists('checkLinkTest')) {
    function checkLinkTest($user, $test_id, $statusFree)
    {
        if ($user) {
            if ($user->can('view-result') || $user->hasPermissionViewTest($test_id) || $statusFree) {
                return true;
            }
        } elseif ($statusFree) {
            return true;
        }

        return false;
    }
}
