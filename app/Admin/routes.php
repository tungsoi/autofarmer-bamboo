<?php

use Illuminate\Routing\Router;

Route::get('/', function () {
    return redirect()->route('admin.home');
});

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->post('/buy_histories/storeReq', 'BuyHistoryController@storeReq')->name('buy_histories.storeReq');
    $router->post('/buy_histories/updateReq', 'BuyHistoryController@updateReq')->name('buy_histories.updateReq');

    $router->resources([
        'buy_histories'   =>  'BuyHistoryController',
        'debts'           =>  'DebtController',
        'revenues'        =>  'RevenueController',
        'clones'          =>  'CloneController',
        'devices'         =>  'DeviceController'
    ]);

});

Route::group([
    'prefix'        =>  config('admin.route.prefix'),
    'namespace'     =>  config('admin.route.namespace'),
    'as'            =>  config('admin.route.prefix') . '.',
    'middleware'    => ['web']
], function (Router $router) {
    $router->get('/auth/register', 'AuthController@getRegister')->name('register');
    $router->post('/auth/register', 'AuthController@postRegister')->name('register');
});