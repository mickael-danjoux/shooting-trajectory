<?php

return [
    'homepage' => [
        'path' => '/',
        'method' => 'get',
        'action' => 'Index::index'
    ],
    
    'tp1-post' => [
        'path' => '/tp1',
        'method' => 'post',
        'action' => 'TP1::index'
    ],
    'tp1-get' => [
        'path' => '/tp1',
        'method' => 'get',
        'action' => 'TP1::index'
    ],
    'tp2-post' => [
        'path' => '/tp2',
        'method' => 'post',
        'action' => 'TP2::index'
    ],
    'tp2-get' => [
        'path' => '/tp2',
        'method' => 'get',
        'action' => 'TP2::index'
    ],
    'tp3-post' => [
        'path' => '/tp3',
        'method' => 'post',
        'action' => 'TP3::index'
    ],
    'tp3-get' => [
        'path' => '/tp3',
        'method' => 'get',
        'action' => 'TP3::index'
    ],
    'tp4-post' => [
        'path' => '/tp4',
        'method' => 'post',
        'action' => 'TP4::index'
    ],
    'tp4-get' => [
        'path' => '/tp4',
        'method' => 'get',
        'action' => 'TP4::index'
    ],

    'post' => [
        'path' => '/posts/:id',
        'method' => 'get',
        'action' => 'Index::post',
        'params' => [
            'id' => '[0-9]+'
        ]
    ]
];