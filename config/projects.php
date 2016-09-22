<?php
/**
 * Created by PhpStorm.
 * User: waco
 * Date: 16/9/13
 * Time: 下午1:50
 */

return [
    'projects_table' => 'projects',
    'types' => [
        0=>'普通项目',
        1=>'五星项目'
    ],
    'has_stores' => [
        0=>'没有',
        1=>'有'
    ],
    'fields_search' => [
        'name'  => [
            'label' => '姓名',
            'tags'  => "projects.name like CONCAT('%', ?, '%')"
        ],
        'ways'  => [
            'label' => '联系方式',
            'tags'  => "projects.ways like CONCAT('%', ?, '%')"
        ],
        'business_name'  => [
            'label' => '企业名称',
            'tags'  => "projects.business_name like CONCAT('%', ?, '%')"
        ],
        'brand_name'  => [
            'label' => '品牌名称',
            'tags'  => "projects.brand_name like CONCAT('%', ?, '%')"
        ]
    ],
];