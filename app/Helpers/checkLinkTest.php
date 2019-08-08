<?php
if (!function_exists('starNumber')) {
    function checkLinkTest($user, $test_id, $statusFree)
    {
        if ($user) {
            if ($user->can('view-result') || $user->hasPermissionViewTest($test_id)) {
                return true;
            }
        } elseif ($statusFree) {
            return true;
        }

        return false;
    }
}
