<?php
if (!function_exists('src_image_use')) {
    function src_image_use($user)
    {
        if ($user->image_id) {
            return asset($user->file->base_folder . '/' . $user->file->name);
        } else {
            return asset(config('constant.icon.link_country_placeholder'));
        }
    }
}
