<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
'middleware'=>'api',
'prefix'=>'auth',
    'namespace'=>'App\Http\Controllers'
],
    function ($router)
    {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');
    });

Route::group([
    'middleware'=>'jwt.verify',
    'prefix'=>'auth',
    'namespace'=>'App\Http\Controllers'
],
    function ($router) {

        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::get('user-profile', 'AuthController@userProfile');
    });

Route::group([
    'middleware'=>'jwt.verify',
    'namespace'=>'App\Http\Controllers'
    ],
    function ($router) {
        Route::resource('books', 'BooksController', ['only' => ['index','store','update','destroy']]);
        });

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});
