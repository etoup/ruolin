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
Breadcrumbs::register('backend.shows.review', function($breadcrumbs)
{
    $breadcrumbs->parent('backend');
    $breadcrumbs->push('路演审核', route('backend.shows.review'));

});