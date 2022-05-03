<?php

return [
    'name'    => 'Admin',
    'sidebar' => [
        [
            'route' => 'get_admin.index',
            'name'  => 'Tổng quan',
            'icon'  => 'fa-dashboard',
            'sub'   => [

            ]
        ],
        [
            'route' => 'get_admin.user.index',
            'name'  => 'Khách hàng',
            'icon'  => 'fa-user',
        ],
        [
            'name' => 'Sản phẩm',
            'icon' => 'fa-database',
            'sub'  => [
                [
                    'route' => 'get_admin.attribute.index',
                    'name'  => 'QL thuộc tính',
                    'slug'  => 'attribute'
                ],
                [
                    'route' => 'get_admin.type.index',
                    'name'  => 'QL phân loại',
                    'slug'  => 'attribute'
                ],
                [
                    'route' => 'get_admin.keyword.index',
                    'name'  => 'QL từ khoá',
                    'slug'  => 'keyword'
                ],
                [
                    'route' => 'get_admin.category.index',
                    'name'  => 'QL danh mục',
                    'slug'  => 'category'
                ],
                [
                    'route' => 'get_admin.product.index',
                    'name'  => 'QL tour',
                    'slug'  => 'product'
                ],
                [
                    'route' => 'get_admin.product_item.index',
                    'name'  => 'Ql lộ trình',
                    'slug'  => 'product_item'
                ],
            ]
        ],
        [
            'name' => 'Đơn hàng',
            'icon' => 'fa-opencart',
            'sub'  => [
                [
                    'route' => 'get_admin.transaction.index',
                    'name'  => 'Danh sách',
                    'slug'  => 'transaction'
                ],
            ]
        ],
        [
            'name' => 'Blog',
            'icon' => 'fa-pencil-square',
            'sub'  => [
                [
                    'route' => 'get_admin.tag.index',
                    'name'  => 'QL từ tag',
                    'slug'  => 'tag'
                ],
                [
                    'route' => 'get_admin.menu.index',
                    'name'  => 'QL menu',
                    'slug'  => 'menu'
                ],
                [
                    'route' => 'get_admin.article.index',
                    'name'  => 'QL bài viết',
                    'slug'  => 'article'
                ],
            ]
        ],
        [
            'route' => 'get_admin.file.index',
            'name'  => 'Files',
            'icon'  => 'fa fa-file',
        ],
        [
            'route' => 'get_admin.setting.index',
            'name'  => 'Cấu hình',
            'icon'  => 'fa fa-cogs',
        ],
    ]
];
