<?php
return[
    [
        'title'=>'Dashboard',
        'icon'=>'ri-dashboard-2-line',
        'route'=>'admin.index',
        'active'=>'admin.index',
    ],
    [
        'title'=>'About',
        'icon'=>'ri-dashboard-2-line',
        'route'=>'admin.about',
        'active'=>'admin.about',
    ],
    [
        'title'=>'Categories',
        'icon'=>'ri-apps-2-line',
        'route'=>'sidebar1',
        'active'=>'admin.categories.*',
        'child'=>true,
        'one_child'=>'All Categories',
        'one_route'=>'admin.categories.index',
        'two_child'=>'Create Categories',
        'two_route'=>'admin.categories.create',
    ],
    [
        'title'=>'Products',
        'icon'=>'ri-apps-2-line',
        'route'=>'sidebar2',
        'active'=>'admin.products.*',
        'child'=>true,
        'one_child'=>'All Products',
        'one_route'=>'admin.products.index',
        'two_child'=>'Create Products',
        'two_route'=>'admin.products.create',
    ],
    [
        'title'=>'Order',
        'icon'=>'ri-dashboard-2-line',
        'route'=>'admin.orders',
        'active'=>'admin.orders',
    ],
];
