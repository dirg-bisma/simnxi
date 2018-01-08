<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/14/2017
 * Time: 4:32 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\DetailTaksasi;
use Mockery\Exception;

class DetailTaksasiController extends Controller
{
    public function DetailTaksasiList(Request $request)
    {
        $validateReq = \Validator::make($request->all(), [
            'username' => 'required',
            'id_taksasi' => 'required',
        ]);

        if(!$validateReq->fails()){

            $detailtaksasi = new DetailTaksasi();
            $data_count = $detailtaksasi->where('id_taksasi', $request->input('id_taksasi'));
            if($data_count->count() > 0){
                $data = $detailtaksasi->where('id_taksasi', $request->input('id_taksasi'))->get();
                return array(
                    'count' => $data_count->count(),
                    'data' => $data,
                    'msg' => 'success',
                    'status' => 'true'
                );
            }else{
                return array(
                    'msg' => 'data not found',
                    'status' => 'false'
                );
            }
        }else{
            return array(
                'msg' => 'check parameter requirment.',
                'status' => 'false',
                'param' => $validateReq->errors()->all()
            );
        }
    }

    public function DetailTaksasiById(Request $request)
    {
        $validateReq = \Validator::make($request->all(), [
            'username' => 'required',
            'id_detail_taksasi' => 'required'
        ]);

        if(!$validateReq->fails()){
            $detailtaksasi = new DetailTaksasi();
            $data_count = $detailtaksasi->where('id_detail_taksasi', $request->input('id_detail_taksasi'));
            if($data_count->count() > 0){
                $data = $detailtaksasi->where('id_detail_taksasi', $request->input('id_detail_taksasi'))->first();
                return array(
                    'count' => $data_count->count(),
                    'data' => $data,
                    'msg' => 'success',
                    'status' => 'true'
                );
            }else{
                return array(
                    'msg' => 'data not found',
                    'status' => 'false'
                );
            }
        }else{
            return array(
                'msg' => 'check parameter requirment.',
                'status' => 'false',
                'param' => $validateReq->errors()->all()
            );
        }
    }

    public function DetailTaksasiCreate(Request $request)
    {
        $detailtaksasi = new DetailTaksasi();
        $validateReq = $detailtaksasi->Validate($request);

        if(!$validateReq->fails()){
            try{
                $detailtaksasi->SaveDetailTaksasi($request);
                return array(
                    'msg' => 'success',
                    'status' => 'true',
                );
            }catch (Exception $exception){
                return array(
                    'msg' => 'save error',
                    'status' => 'false',
                    'error' => $exception
                );
            }

        }else{
            return array(
                'msg' => 'check parameter requirment.',
                'status' => 'false',
                'param' => $validateReq->errors()->all()
            );
        }
    }

    public function DetailTaksasiUpdate(Request $request)
    {
        $detailtaksasi = new DetailTaksasi();
        $validateReq = $detailtaksasi->Validate($request);

        if(!$validateReq->fails()){
            try{
                $detailtaksasi->UpdateDetailTaksasi($request);
                return array(
                    'msg' => 'success',
                    'status' => 'true',
                );
            }catch (Exception $exception){
                return array(
                    'msg' => 'update error',
                    'status' => 'false',
                    'error' => $exception
                );
            }

        }else{
            return array(
                'msg' => 'check parameter requirment.',
                'status' => 'false',
                'param' => $validateReq->errors()->all()
            );
        }
    }

    public function Test()
    {
        $detailTaksasi = new DetailTaksasi();

        $data = $detailTaksasi->Bbpm('BLL', '24');
        return $data;
    }

}