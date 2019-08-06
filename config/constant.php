<?php

return [
    'paginate' => 10,
    'limit_questions' => 10,
    'limit_ranking' => 10,
    'limit_history' => 10,
    'default_password' => 'academics',
    'icon' => [
        'link_logo' => 'Client/images/logo.jpg',
        'link_country_gb' => 'Admin/assets/images/flags/gb.png',
        'link_country_de' => 'Admin/assets/images/flags/de.png',
        'link_country_placeholder' => 'Admin/assets/images/placeholder.jpg',
        'link_star' => 'Client/images/star.png',
    ],
    'ranking' => [
        '0_ranking' => 'bg-warning',
        '1_ranking' => 'bg-primary',
        '2_ranking' => 'bg-success',
    ],
    'stars' => [
        '1_star' => 20,
        '2_star' => 40,
        '3_star' => 60,
        '4_star' => 80,
        '5_star' => 100,
    ],
    'links' => [
        'link_facebook' => '#',
        'link_youtube' => '#',
        'link_twitter' => '#'
    ],
    'setting' => [
        'phone_help' => '0136 548 245',
        'email_help' => 'admin@gmail.com',
    ],
    'active' => 1,
    'not_active' => 0,
    'limit_questions_test' => 20,
    'success' => 'Action success',
    'action_fault' => 'Action fault',
    'action_use_wrong' => 'User wrong',
    'title_action_setRole' => 'Set Role',
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
