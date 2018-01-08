<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/20/2017
 * Time: 6:18 PM
 */
namespace App\Http\Controllers\Onfarm;

use App\Http\Controllers\Controller;
use App\Model\Master\Bbpm;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Model\Kp;
use App\Model\Master\VwBbpm;
use App\Model\Master\Varietas;


class BbpmController extends Controller
{

    public function Index()
    {
        $kp = new Kp();
        $data['kp'] = $kp->where('kode_kp', '!=', 'KP00')->get();
        return view('onfarm.bbpm.index', $data);
    }

    public function ShowForm($kode_kp)
    {
        $kp = new Kp();
        $data['kp'] = $kp->where('kode_kp', $kode_kp)->first();
        $bbpm = new VwBbpm();
        $data['bbpm'] = $bbpm->where('kode_kp', $kode_kp)->get();
        $varietas = new Varietas();
        $data['varietas'] = $varietas->get();

        return view('onfarm.bbpm.form', $data);
    }

    public function Save(Request $request)
    {
        if($request->input('action') == 'create'){
            $bbpm = new Bbpm();
            $bbpm->id_varietas = $request->input('id_varietas');
            $bbpm->diameter = $request->input('diameter');
            $bbpm->nilai_bbpm = $request->input('nilai_bbpm');
            $bbpm->kode_kp = $request->input('kode_kp');
            $simpan = $bbpm->save();
            if($simpan){
                return array(
                    'status' => 'true',
                    'msg' => 'simpan berhasil.'
                );
            }else{
                return array(
                    'status' => 'false',
                    'msg' => 'simpan gagal.'
                );
            }
        }elseif ($request->input('action') == 'update'){
            $bbpm = new Bbpm();
            $bbpm->where('id_bbpm', $request->input('id_bbpm'))
                 ->update(array(
                    'diameter' => $request->input('diameter'),
                    'nilai_bbpm' => $request->input('nilai_bbpm')
                 ));
        }

    }

    public function delete(Request $request)
    {
        $bbpm = new Bbpm();
        $bbpm->where('id_bbpm', $request->input('id_bbpm'));
        $del = $bbpm->delete();
        if($del){
            return array(
                'status' => 'true',
                'msg' => 'data deleted'
            );
        }else{
            return array(
                'status' => 'false',
                'msg' => 'error'
            );
        }
    }

    public function LoadData($kode_kp)
    {
        $vwbbpm = new VwBbpm();
        $data['bbpm'] = $vwbbpm->where('kode_kp', $kode_kp)->get();
        return view('onfarm.bbpm.table', $data);
    }
}