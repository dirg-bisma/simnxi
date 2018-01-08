<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/13/2017
 * Time: 12:27 PM
 */
Route::get('kp', 'KpController@index')->name('kp-index');
Route::get('kp/{kode_kp}', 'KpController@DataByKode')->name('kp-by-kode');