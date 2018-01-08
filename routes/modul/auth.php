<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/13/2017
 * Time: 9:03 PM
 */
Route::post('auth/apilogin', 'AuthController@Login')->name('auth-login');
Route::get('auth/validate/register/{id_sap}', 'AuthController@ValidateRegister')->name('auth-validate-register');
Route::post('auth/register', 'AuthController@Register')->name('auth-register');