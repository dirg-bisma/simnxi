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

require_once "modul/kp.php";
require_once "modul/auth.php";
require_once "modul/taksasi.php";
require_once "modul/detail_taksasi.php";

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


