<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Taksasi extends Model
{
    //
    protected $table = 'onfarm.taksasi';
    protected $primaryKey = 'id_taksasi';
    public $timestamps = false;

    public function TaksasiUpdate(Request $request)
    {
        $data = array(
            'status' => '1',
            'id_gis' => $request->input('id_gis'),
            'fkebun' => $request->input('fkebun'),
            'got' => $request->input('got'),
            'gulud' => $request->input('gulud'),
            'klentek' => $request->input('klentek'),
            'hama' => $request->input('hama'),
            'pertumbuhan' => $request->input('pertumbuhan'),
            'pandangan' => $request->input('pandangan'),
            'hitungan' => $request->input('hitungan'),
            'kesimpulan' => $request->input('kesimpulan'),
            'jarak_angkut' => $request->input('jarak_angkut'),
            'tgl_taksasi' => date('Y-m-d'),
            'update_at' => date('Y-m-d'),
        );
        $this->where('id_taksasi', $request->input('id_taksasi'))
            ->update($data);
    }

    public function ValidateUpdate(Request $request)
    {
        $validateReq = \Validator::make($request->all(), [
            'id_gis' => 'required',
            'id_taksasi' => 'required',
            'username' => 'required',
            'fkebun' => 'required',
            'got' => 'required',
            'gulud' => 'required',
            'klentek' => 'required',
            'hama' => 'required',
            'pertumbuhan' => 'required',
            'pandangan' => 'required',
            'hitungan' => 'required',
            'kesimpulan' => 'required',
            'jarak_angkut' => 'required',
        ]);

        return $validateReq;
    }
}
