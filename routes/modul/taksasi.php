<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/14/2017
 * Time: 11:14 AM
 */
Route::post('taksasi/list', 'TaksasiController@TaksasiList')->name('taksasi-list');
Route::post('taksasi/detail', 'TaksasiController@TaksasiDetail')->name('taksasi-detail');
Route::post('taksasi/search', 'TaksasiController@TaksasiSearch')->name('taksasi-search');
Route::get('taksasi/search', 'TaksasiController@TaksasiSearch')->name('taksasi-search');
Route::post('taksasi/status', 'TaksasiController@TaksasiByStatus')->name('taksasi-status');
Route::post('taksasi/update', 'TaksasiController@TaksasiUpdate')->name('taksasi-update');
