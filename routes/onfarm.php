<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/20/2017
 * Time: 7:32 PM
 */

require_once ("taksasi/taksasi.php");
require_once ("taksasi/bbpm.php");

Route::get('dashboard', 'Onfarm\DashboardController@Index')->name('onfarm-dashboard-index');
