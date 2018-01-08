<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/20/2017
 * Time: 7:31 PM
 */

Route::get('bbpm', 'Onfarm\BbpmController@Index')->name('onfarm-taksasi-bbpm-index');
Route::get('bbpm/form/{kode_kp}', 'Onfarm\BbpmController@ShowForm')->name('onfarm-taksasi-bbpm-showform');
Route::post('bbpm/save', 'Onfarm\BbpmController@Save')->name('onfarm-taksasi-bbpm-save');
Route::get('bbpm/table/{kode_kp}', 'Onfarm\BbpmController@LoadData')->name('onfarm-taksasi-bbpm-table');