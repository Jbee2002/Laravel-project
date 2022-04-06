<?php
return [
    [
        'route' =>  'admin.index',
        'title' => 'Trang chủ',
        'icon' => 'fa-home'
    ],
    [
        'route' => 'category.index',
        'title' => 'Danh mục',
        'icon' => 'fa-dashboard',
        'items' => [
            [
                'route' => 'category.index',
                'title' => 'Danh sách',
                'icon' => 'fa-circle-o'
            ],
            [
                'route' => 'category.create',
                'title' => 'Thêm mới',
                'icon' => 'fa-circle-o'
            ]
        ]
    ],
    [
        'route' => 'product.index',
        'title' => 'Sản phẩm',
        'icon' => 'fa-dashboard',
        'items' => [
            [
                'route' => 'product.index',
                'title' => 'Danh sách',
                'icon' => 'fa-circle-o'
            ],
            [
                'route' => 'product.create',
                'title' => 'Thêm mới',
                'icon' => 'fa-circle-o'
            ]
        ]
            ],
            [
                'route' =>'customer.index',
                'title' => 'Khách hàng',
                'icon' => 'fa-user'
            ]
            ,[
                'route' =>'order_list',
                'title' => 'Đơn hàng',
                'icon' => 'fa-dashboard'
            ],[
                'route' =>'banner.index',
                'title' => 'Banner',
                'icon' => 'fa-dashboard'
            ]
   

];
