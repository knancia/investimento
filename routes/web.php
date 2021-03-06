<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Pagina inicial
 * Home page
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Rotas para autenticação do usuario
 * Routes to user auth
 */
 Route::get('/login', ['uses' => 'Controller@fazerLogin']);
 Route::post('/login', ['as' => 'user.login', 'uses' => 'DashboardController@auth']);
 Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);
 Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'GroupsController@userStore']); //
 Route::get('investir', ['as' => 'moviment.application', 'uses' => 'MovimentsController@application']);
 Route::post('moviment', ['as' => 'moviment.application.store', 'uses' => 'MovimentsController@storeApplication']);
 Route::get('aplicacao', ['as' => 'moviment.index', 'uses' => 'MovimentsController@index']);
 Route::get('resgatar', ['as' => 'moviment.getback', 'uses' => 'MovimentsController@getback']);
 Route::post('resgatar', ['as' => 'moviment.getback.store', 'uses' => 'MovimentsController@storeGetback']);


 Route::get('extrato', ['as' => 'moviment.all', 'uses' => 'MovimentsController@all']);
 Route::resource('user', 'UsersController');
 Route::resource('instituition', 'InstituitionsController');
 Route::resource('group', 'GroupsController');
 Route::resource('instituition.product', 'productsController');