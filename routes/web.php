<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    //return $router->app->version();
    return view('index');
});

// $router->get('{path:.*}', function () {
//     return view('index');
// });

$router->get('/review', function () {
    return
    [
        [
            'map'=>'map1',
            'comments' => [
                ['id' => 1,'comment' => 'test1'],
                ['id' => 2,'comment' => 'test2'],
                ['id' => 3,'comment' => 'test3']
            ]
        ],
        [
            'map'=>'map2',
            'comments' => [
                ['id' => 1,'comment' => 'test1 coment 1'],
                ['id' => 2,'comment' => 'test2 coment 2'],
                ['id' => 3,'comment' => 'test3 coment 3']
            ]
        ]
    ];
});