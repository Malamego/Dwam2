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


Route::middleware(\App\Http\Middleware\LangMiddleware::class)->group(function () {
    Auth::routes();

    Route::get('/lang/{lang}', 'FrontendController@changeLang');

    Route::get('/', 'FrontendController@index');

    Route::get('/logout', 'FrontendController@logout');

    Route::get('/lesson/{id}', 'FrontendController@lesson');

    Route::post('/sendAnswers', 'FrontendController@sendAnswers');
});
