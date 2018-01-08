<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/20/2017
 * Time: 8:39 PM
 */

namespace App\Http\Controllers\Onfarm;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function Index()
    {
        //\Debugbar::disable();
        return view('layouts.material');
    }
}