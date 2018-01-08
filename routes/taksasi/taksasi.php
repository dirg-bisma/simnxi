<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/20/2017
 * Time: 7:31 PM
 */

Route::get('taksasi', 'Onfarm\TaksasiController@Index')->name('onfarm-taksasi-index');
Route::get('taksasi/ajax/', 'Onfarm\TaksasiController@Data')->name('onfarm-taksasi-data');
Route::get('taksasi/form', 'Onfarm\TaksasiController@Data')->name('onfarm-taksasi-data');
Route::get('taksasi/edit/form', 'Onfarm\TaksasiController@Form')->name('onfarm-taksasi-form-edit');
Route::post('taksasi/create', 'Onfarm\TaksasiController@Create')->name('onfarm-taksasi-create');
Route::post('taksasi/update', 'Onfarm\TaksasiController@Update')->name('onfarm-taksasi-update');
Route::get('taksasi/validasi/petak', 'Onfarm\TaksasiController@ValidasiNoPetak')->name('onfarm-taksasi-validasi-petak');