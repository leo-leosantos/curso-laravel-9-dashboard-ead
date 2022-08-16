<?php

return [
    'menus' => [
        [
            'name' => 'Home',
            'url' => env('APP_URL') . 'admin',
            'icon' => 'fas fa-tachometer-alt'
        ],
        [
            'name' => 'Usuários',
            'url' =>  env('APP_URL') .'admin/users',
            'icon' => 'fas fa-users'
        ],
        [
            'name' => 'Formulários CSS',
            'url' => env('APP_URL') .'admin/tabelas',
            'icon' => 'fas fa-table'
        ],


    ]
];
