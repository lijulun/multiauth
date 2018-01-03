<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('multi.auth')->get('/user', function (Request $request) {
    return $request->user('api');
});

Route::group(['middleware' => 'api', 'prefix' => 'teachers'], function () {
    Route::get('/me', function (Request $request) {
        return $request->user('api');
    })->middleware('teacher');
});

Route::post('/logout', 'Auth\LoginController@logout');