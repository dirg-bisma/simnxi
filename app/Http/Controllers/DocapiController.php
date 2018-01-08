<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/14/2017
 * Time: 8:17 AM
 */

namespace App\Http\Controllers;

use App\Model\Apidoc;

class DocapiController extends Controller
{
    public function Index(){

        $apidoc = new Apidoc();
        $data = $apidoc->select('*')->get();

        return view('docapi.index', compact('data'));
    }
}