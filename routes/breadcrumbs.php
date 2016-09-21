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
    $breadcrumbs->push('会员列表', route('backend.users'));
});

Breadcrumbs::register('backend.projects', function($breadcrumbs)
{
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('项目列表', route('backend.projects'));
});

Breadcrumbs::register('backend.regions', function($breadcrumbs)
{
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('地区列表', route('backend.regions'));
});

Breadcrumbs::register('backend.industries', function($breadcrumbs)
{
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('行业列表', route('backend.industries'));
});

Breadcrumbs::register('backend.quotas', function($breadcrumbs)
{
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('额度列表', route('backend.quotas'));
});