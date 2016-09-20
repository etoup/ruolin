<?php
/**
 * Created by PhpStorm.
 * User: waco
 * Date: 16/9/13
 * Time: 下午1:50
 */

return [
    'users_table' => 'users',
    'fields_search' => [
        'nickname'  => [
            'label' => '昵称',
            'tags'  => "nickname like CONCAT('%', ?, '%')"
        ],
        'email'  => [
            'label' => '属性',
            'tags'  => "email like CONCAT('%', ?, '%')"
        ],
        'mobile'  => [
            'label' => '手机号码',
            'tags'  => "mobile like CONCAT('%', ?, '%')"
        ]
    ],
];