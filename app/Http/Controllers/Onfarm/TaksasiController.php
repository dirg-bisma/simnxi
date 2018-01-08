<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/21/2017
 * Time: 6:15 PM
 */

namespace App\Http\Controllers\Onfarm;


use App\Http\Controllers\Controller;
use App\Model\Taksasi;
use Illuminate\Http\Request;
use App\Model\Vtaksasi;
use App\Model\Sap\Petak;

class TaksasiController extends Controller
{
    public function Index($bulan, $kp = '')
    {
        $data['bulan'] = $bulan;
        $data['kp'] = $kp;
        return view('onfarm.taksasi.index', $data);
    }

    public function Data(Request $request)
    {
        $vtaksasi = new Vtaksasi();
        $taksasi = $vtaksasi
            ->limit($request->input('length'));
        if($request->input('start') != 0){
            $taksasi->offset($request->input('start'));
        }
        $q = strtoupper($request->input('search.value'));
        if($q != "")
        {
            $taksasi->where(\DB::raw('LOWER(desc)'), 'LIKE', "%$q%");
        }

        $arr_tak = array();
        $jumlah = 0;
        foreach ($taksasi->get() as $d){
            $bulan = '';
            if($d->bulan == '12'){
                $bulan = 'Desember';
            }elseif($d->bulan == '04'){
                $bulan = 'Maret';
            }
            $push = array(
                $bulan,
                $this->Label($d->status),
                $d->kode_petak,
                $d->divisi,
                $d->desc,
                $this->Link($d->id_taksasi)
            );
            array_push($arr_tak, $push);
            $jumlah++;
        }

        $taksasi_count = new Vtaksasi();

        return array(
            'recordsTotal' => $taksasi_count->count(),
            'recordsFiltered' => $jumlah,
            'data' => $arr_tak,
        );
    }

    public function Form()
    {
        return view('onfarm.taksasi.form');
    }

    public function ValidasiNoPetak(Request $request)
    {
        $vtaksasi = new Vtaksasi();
        $petak = new Petak();

        $data_petak = $petak->where('kode_petak', $request->input('kode_petak'))->first();

        $count_data = $vtaksasi->where('kode_petak', $request->input('kode_petak'))
            ->where('bulan', $request->input('bulan'))->count();

        $data = $vtaksasi->where('kode_petak', $request->input('kode_petak'))
            ->where('bulan', $request->input('bulan'))->first();

        return array("count" => $count_data, "petak" => $data_petak, "data" => $data);

    }

    public function Create(Request $request)
    {
        $vtaksasi = new Vtaksasi();
        $count_data = $vtaksasi->where('kode_petak', $request->input('kode_petak'))
            ->where('tahun_taksasi', $request->input('tahun_taksasi'))
            ->where('bulan', $request->input('bulan'))->count();
        if($count_data == 0){
            $taksasi = new Taksasi();
            $taksasi->id_sap = $request->input('id_sap');
            $taksasi->bulan = $request->input('bulan');
            $taksasi->tahun_taksasi = $request->input('tahun_taksasi');
            $taksasi->kode_petak = $request->input('kode_petak');
            $taksasi->tgl_planing = $request->input('tgl_planing');
            $taksasi->kode_varietas = $request->input('kode_varietas');
            $taksasi->status = '0';
            $taksasi->save();

            return array('status' => 'true');
        }else{
            return array('status' => 'false');
        }

    }

    public function Update(Request $request)
    {

    }

    private function Link($id_taksasi)
    {
        $route = route('onfarm-taksasi-form-edit', array('id_taksasi' => $id_taksasi));
        $str = '<a href="#" onclick="$(\'#konten\').load(\''.$route.'\')" class="loaded_konten"><i class="material-icons">mode_edit</i></a>';

        return $str;
    }

    private function Label($status)
    {
        if($status == '0'){
            $str = '<span class="label bg-red">on Progres</span>';
        }else{
            $str = '<span class="label bg-green">Finish</span>';
        }
        return $str;
    }
}