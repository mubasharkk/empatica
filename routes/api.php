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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/download', 'Api\DownloadController');
Route::get('/download/app/{type}', [
    'uses' => 'Api\DownloadController@index',
    'as' => 'api.download.type'
]);

Route::get('/dashboard/graph/{type}/data', 'Api\DashboardDataController@index');
