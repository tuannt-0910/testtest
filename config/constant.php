<?php

return [
    'paginate' => 10,
    'limit_questions' => 10,
    'default_password' => 'academics',
    'icon' => [
        'link_logo' => 'Admin/assets/images/logo_light.png',
        'link_country_gb' => 'Admin/assets/images/flags/gb.png',
        'link_country_de' => 'Admin/assets/images/flags/de.png',
        'link_country_placeholder' => 'Admin/assets/images/placeholder.jpg',
    ],
    'active' => 1,
    'not_active' => 0,
    'limit_questions_test' => 20,
    'success' => 'Action success',
    'action_fault' => 'Action fault',
    'action_use_wrong' => 'User wrong',
    'input_errors' => [
        'username_required' => 'required',
        'username_max' => 'required',
        'firstname_required' => 'required',
        'firstname_max' => 'required',
        'lastname_required' => 'required',
        'lastname_max' => 'required',
        'address_required' => 'required',
        'address_max' => 'required',
        'phone_required' => 'required',
        'phone_max' => 'required',
        'email_required' => 'required',
        'email_email' => 'required',
        'email_unique' => 'required',
        'email_max' => 'required',
        'birthday_required' => 'required',
        'avatar_max' => 'required',
        'avatar_mimes' => 'required',
        'role_required' => 'required',
        'name_cate_required' => 'required',
        'name_cate_max' => 'max',
        'guide_category_max' => 'max',
        'testname_required' => 'required',
        'testname_max' => 'required',
        'testcode_required' => 'required',
        'testcode_max' => 'required',
        'content_guide_required' => 'required',
        'content_guide_max' => 'required',
        'execute_time_required' => 'required',
        'execute_time_max' => 'required',
        'total_question_required' => 'required',
        'total_question_max' => 'required',
        'old_password_required' => 'required',
        'old_password_wrong' => 'old password wrong',
        'old_password_min' => 'required',
        'old_password_max' => 'required',
        'new_password_required' => 'required',
        'new_password_max' => 'required',
        'new_password_min' => 'required',
        'confirm_password_required' => 'required',
        'confirm_password_same' => 'not same',
        'email_exists' => 'not exists',
        'password_required' => 'required',
        'password_max' => 'required',
        'email_password_wrong' => 'account or password wrong',
    ],
    'color' => [
        'text' => 'label label-default',
        'image' => 'label label-success',
        'audio' => 'label label-primary',
    ],
    'column_chart' => [
        'color_tests' => '#E53935',
        'color_tested' => '#3949AB',
        'height' => 500,
        'tick_rotate' => 45,
    ],
];
