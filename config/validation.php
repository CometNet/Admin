<?php

return [
    'member' => [
        'store' => [
            'name' => [
                'name' => '用户名',
                'rules' => 'required|min:6|max:14|unique:members',
                'message' => ['min' => '用户名最少为6位', 'max' => '用户名最多为14位','unique' => '该名称已存在']
            ],
            'password' => [
                'name' => '注册密码',
                'rules' => 'required|min:6|max:12|confirmed',
                'message' => ['min' => '密码最少为6位', 'max' => '密码最多为12位','confirmed' => '两次密码输入不一致']
            ]
        ],
        'login' => [
            'name' => [
                'name' => '用户名',
                'rules' => 'required',
                'message' => []
            ],
            'password' => [
                'name' => '注册密码',
                'rules' => 'required',
                'message' => []
            ],
        ],
    ]
];
