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

Breadcrumbs::register('backend.shows', function($breadcrumbs)
{
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('路演列表', route('backend.shows'));

});
Breadcrumbs::register('backend.shows.categories', function($breadcrumbs)
{
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('路演分类', route('backend.shows.categories'));

});
Breadcrumbs::register('backend.shows.review', function($breadcrumbs) {
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('路演审核', route('backend.shows.review'));

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