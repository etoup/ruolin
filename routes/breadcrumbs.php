<?php
/**
 * Created by PhpStorm.
 * User: waco
 * Date: 16/9/18
 * Time: 下午1:55
 */

// Backend
Breadcrumbs::register('backend', function($breadcrumbs)
{
    $breadcrumbs->push('控制台', route('backend'));
});

Breadcrumbs::register('backend.users', function($breadcrumbs)
{
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('会员管理', route('backend.users'));
});
