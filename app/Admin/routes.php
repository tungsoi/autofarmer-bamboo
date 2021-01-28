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

    $router->resources([
        'buy_histories'   =>  'BuyHistoryController'
    ]);

});