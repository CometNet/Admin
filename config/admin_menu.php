<?php

return [
    'admin' =>[
        'name' => '仪表盘',
        'icon' => 'fa fa-cog',
        'router' => 'admin.dashboard',
    ],
    'member' => [
        'name' => '用户管理',
        'icon' => 'fa fa-users',
        'router' => '',
        'submenus' => [
            [
                'title' => '用户列表',
                'router' => 'member.index',
                'icon' => 'fa fa-circle-o',
                'actions' => [
                    [
                        'name' => '查看用户',
                        'router' => 'member.show'
                    ]
                ]
            ],
            [
                'title' => '创建用户',
                'router' => 'member.create',
                'icon' => 'fa fa-circle-o',
                'actions' => [
                    [
                        'name' => '创建用户',
                        'router' => 'member.create'
                    ]
                ]
            ]
        ]
    ],
    'channel' => [
        'name' => '支付通道',
        'icon' => 'fa fa-users',
        'router' => '',
        'submenus' => [
            [
                'title' => '支付列表',
                'router' => 'channel.index',
                'icon' => 'fa fa-circle-o',
                'actions' => [
                    [
                        'name' => '查看用户',
                        'router' => 'member.show'
                    ]
                ]
            ],
            [
                'title' => '创建支付',
                'router' => 'channel.create',
                'icon' => 'fa fa-circle-o',
                'actions' => [
                    [
                        'name' => '创建用户',
                        'router' => 'member.create'
                    ]
                ]
            ]
        ]
    ],
];
