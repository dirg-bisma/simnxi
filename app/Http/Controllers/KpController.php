<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/13/2017
 * Time: 12:13 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Kp;

class KpController extends Controller
{

    public function Index()
    {
        $kp = DB::select('select * from master.kp');

        return $kp;
    }

    public function DataByKode($kode_kp)
    {
        $kp = new Kp();
        $data = $kp->where('kode_kp', $kode_kp)->first();
        return $data;
    }


    public function Test()
    {
        echo "test page";
    }
}