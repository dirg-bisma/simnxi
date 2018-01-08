<?php

namespace App\Model;

use App\Model\Master\Bbpm;
use App\Model\Master\Varietas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DetailTaksasi extends Model
{
    //
    protected $table = 'onfarm.detail_taksasi';
    protected $primaryKey = 'id_detail_taksasi';
    public $timestamps = false;

    public function Bbpm($kode_varietas, $diameter)
    {
        $bbpm = new Bbpm();

        $varietas = new Varietas();
        $data_varietas = $varietas->where('kode_varietas', $kode_varietas)->first();

        $data_bbpm = $bbpm->where('diameter', $diameter)
            ->where('id_varietas', $data_varietas->id_varietas)->first();
        if(isset($data_bbpm->nilai_bbpm)){
            return $data_bbpm->nilai_bbpm;
        }else{
            return 0;
        }

    }

    private function getTaksasi($id_taksasi)
    {
        $taksasi = new Taksasi();
        $data_taksasi = $taksasi->where('id_taksasi', $id_taksasi)->first();
        return $data_taksasi->kode_varietas;
    }

    public function SaveDetailTaksasi(Request $request)
    {
        $tb_akr_1 = $request->input('tb_skr_1')+$request->input('tb_ptbh_1');
        $tb_akr_2 = $request->input('tb_skr_2')+$request->input('tb_ptbh_2');
        $tb_akr_3 = $request->input('tb_skr_2')+$request->input('tb_ptbh_3');
        $tb_rerata = ($tb_akr_1+$tb_akr_2+$tb_akr_3)/3;

        $kode_varietas = $this->getTaksasi($request->input('id_taksasi'));
        //$detailtaksasi = new DetailTaksasi();
        $this->id_taksasi = $request->input('id_taksasi');
        $this->juring_sample = $request->input('juring_sample');
        $this->jumlah_batang = $request->input('jumlah_batang');
        $this->tb_skr_1 = $request->input('tb_skr_1');
        $this->tb_skr_2 = $request->input('tb_skr_2');
        $this->tb_skr_3 = $request->input('tb_skr_3');
        $this->tb_ptbh_1 = $request->input('tb_ptbh_1');
        $this->tb_ptbh_2 = $request->input('tb_ptbh_2');
        $this->tb_ptbh_3 = $request->input('tb_ptbh_3');
        $this->tb_akr_1 = $tb_akr_1;
        $this->tb_akr_2 = $tb_akr_2;
        $this->tb_akr_3 = $tb_akr_3;
        $this->tb_rerata = $tb_rerata;
        $this->dm_btng_1 = $request->input('dm_btng_1');
        $this->dm_btng_2 = $request->input('dm_btng_2');
        $this->dm_btng_3 = $request->input('dm_btng_3');
        $bbt_btng_1 = $this->Bbpm($kode_varietas, $request->input('dm_btng_1'));
        $bbt_btng_2 = $this->Bbpm($kode_varietas, $request->input('dm_btng_2'));
        $bbt_btng_3 = $this->Bbpm($kode_varietas, $request->input('dm_btng_3'));
        $bbt_btng_rerata = ($bbt_btng_1+$bbt_btng_2+$bbt_btng_3)/3;
        $this->bbt_btng_1 = $bbt_btng_1;//$request->input('bbt_btng_1');
        $this->bbt_btng_2 = $bbt_btng_2;//$request->input('bbt_btng_2');
        $this->bbt_btng_3 = $bbt_btng_3;//$request->input('bbt_btng_3');
        $this->bbt_btng_rerata = $bbt_btng_rerata;//$request->input('bbt_btng_rerata');
        $this->path =  $request->input('path');
        $this->save();
    }

    public function UpdateDetailTaksasi(Request $request)
    {

        $tb_akr_1 = $request->input('tb_skr_1')+$request->input('tb_ptbh_1');
        $tb_akr_2 = $request->input('tb_skr_2')+$request->input('tb_ptbh_2');
        $tb_akr_3 = $request->input('tb_skr_2')+$request->input('tb_ptbh_3');
        $tb_rerata = ($tb_akr_1+$tb_akr_2+$tb_akr_3)/3;

        $data = array(
            'id_taksasi' => $request->input('id_taksasi'),
            'juring_sample' => $request->input('juring_sample'),
            'jumlah_batang' => $request->input('jumlah_batang'),
            'tb_skr_1' => $request->input('tb_skr_1'),
            'tb_skr_2' => $request->input('tb_skr_2'),
            'tb_skr_3' => $request->input('tb_skr_3'),
            'tb_ptbh_1' => $request->input('tb_ptbh_1'),
            'tb_ptbh_2' => $request->input('tb_ptbh_2'),
            'tb_ptbh_3' => $request->input('tb_ptbh_3'),
            'tb_akr_1' => $tb_akr_1,
            'tb_akr_2' => $tb_akr_2,
            'tb_akr_3' => $tb_akr_3,
            'tb_rerata' => $tb_rerata,
            'dm_btng_1' => $request->input('dm_btng_1'),
            'dm_btng_2' => $request->input('dm_btng_2'),
            'dm_btng_3' => $request->input('dm_btng_3'),
            'bbt_btng_1' => $request->input('bbt_btng_1'),
            'bbt_btng_2' => $request->input('bbt_btng_2'),
            'bbt_btng_3' => $request->input('bbt_btng_3'),
            'bbt_btng_rerata' => $request->input('bbt_btng_rerata'),
            'path' => $request->input('path'),
            'update_at' => date('Y-m-d'),
        );

        $this->where('id_detail_transaksi', $request->input('id_detail_transaksi'))
            ->update($data);

    }

    public function Validate(Request $request)
    {
        $validateReq = \Validator::make($request->all(), [
            'id_taksasi' => 'required',
            'juring_sample' => 'required',
            'jumlah_batang' => 'required',
            'tb_skr_1' => 'required',
            'tb_skr_2' => 'required',
            'tb_skr_3' => 'required',
            'tb_ptbh_1' => 'required',
            'tb_ptbh_2' => 'required',
            'tb_ptbh_3' => 'required',
            //'tb_akr_1' => 'required',
            //'tb_akr_2' => 'required',
            //'tb_akr_3' => 'required',
            //'tb_rerata' => 'required',
            'dm_btng_1' => 'required',
            'dm_btng_2' => 'required',
            'dm_btng_3' => 'required',
            //'bbt_btng_1' => 'required',
            //'bbt_btng_2' => 'required',
            //'bbt_btng_3' => 'required',
            //'bbt_btng_rerata' => 'required',
            //'urutan_sample' => 'required',
            'path' => 'required',

        ]);

        return $validateReq;
    }
}
