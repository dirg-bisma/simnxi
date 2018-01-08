<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 1/2/2018
 * Time: 6:55 PM
 */

Route::get('user/json/by/idsap', 'Setting\UsersController@JsonSearchUser')->name('setting-users-json-search');
Route::get('user/json/pegawai/idsap', 'Setting\UsersController@JsonSearchPegawai')->name('setting-users-json-search-pegawai');
Route::get('user/list', 'Setting\UsersController@ListUser')->name('setting-users-list');
Route::get('user/list/json', 'Setting\UsersController@ListUserJson')->name('setting-users-list-json');
Route::get('user/form/add', 'Setting\UsersController@CreateForm')->name('setting-users-form-add');
Route::post('user/form/save', 'Setting\UsersController@Save')->name('setting-users-save');
Route::get('user/form/edit/{id_sap}', 'Setting\UsersController@UpdateForm')->name('setting-users-form-edit');