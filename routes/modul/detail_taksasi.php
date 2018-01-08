<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/14/2017
 * Time: 4:08 PM
 */

Route::post('detailtaksasi/list', 'DetailTaksasiController@DetailTaksasiList')->name('detailtaksasi-list');
Route::post('detailtaksasi/detail', 'DetailTaksasiController@DetailTaksasiById')->name('detailtaksasi-detail');
Route::post('detailtaksasi/create', 'DetailTaksasiController@DetailTaksasiCreate')->name('detailtaksasi-create');
Route::post('detailtaksasi/update', 'DetailTaksasiController@DetailTaksasiUpdate')->name('detailtaksasi-update');
