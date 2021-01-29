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

    $router->resources([
        'buy_histories'   =>  'BuyHistoryController',
        'debts'           =>  'DebtController',
        'revenues'        =>  'RevenueController'
    ]);

});