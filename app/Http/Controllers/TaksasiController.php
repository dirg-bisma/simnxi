<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/14/2017
 * Time: 10:59 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\Taksasi;
use App\Model\Vtaksasi;
use Mockery\Exception;

class TaksasiController extends Controller
{

    public function TaksasiList(Request $request)
    {
        $taksasi = new Taksasi();

        $validateReq = \Validator::make($request->all(), [
            'username' => 'required'
        ]);

        if(!$validateReq->fails()){
            $data = $taksasi->select('*')
                ->where('id_sap', $request->input('username'));

            if($data->count() > 0){
                $Vtaksasi = new Vtaksasi();
                $data_return = $Vtaksasi->select('*')
                    ->where('id_sap', $request->input('username'));
                return array(
                    'count' => $data->count(),
                    'data' => $data_return->get(),
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

    public function TaksasiDetail(Request $request)
    {

        $validateReq = \Validator::make($request->all(), [
            'username' => 'required',
            'kode_petak' => 'required',
        ]);

        if(!$validateReq->fails()){
            $Vtaksasi = new Vtaksasi();
            $data = $Vtaksasi->select('*')
                ->where('id_sap', $request->input('username'))
                ->where('kode_petak', $request->input('kode_petak'));

            if($data->count() > 0){
                $data_return = $Vtaksasi->select('*')
                    ->where('id_sap', $request->input('username'))
                    ->where('kode_petak', $request->input('kode_petak'));
                return array(
                    'count' => $data->count(),
                    'data' => $data_return->get(),
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

    public function TaksasiSearch(Request $request)
    {

        $validateReq = \Validator::make($request->all(), [
            'username' => 'required'
        ]);

        if(!$validateReq->fails()){
            $Vtaksasi = new Vtaksasi();
            $data = $Vtaksasi->select('*')
                ->where('id_sap', $request->input('username'));

            if($request->input('q') != ''){
                $q = $request->input('q');
                $data->where('v_taksasi_petak.description', 'LIKE', "%$q%");
            }

            if($request->input('status') != ''){
                $data->where('status', $request->input('status'));
            }

            if($data->count() > 0){
                $data_return = $Vtaksasi->select('*')
                    ->where('id_sap', $request->input('username'));

                if($request->input('q') != ''){
                    $q = $request->input('q');
                    $data_return->where('v_taksasi_petak.description', 'LIKE', "%$q%");
                }
                if($request->input('status') != ''){
                    $data_return->where('status', $request->input('status'));
                }
                return array(
                    'count' => $data->count(),
                    'data' => $data_return->get(),
                    'msg' => 'success',
                    'status' => 'true',

                );
            }else{
                return array(
                    'msg' => 'data not found',
                    'status' => 'false',
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

    public function TaksasiByStatus(Request $request)
    {
        $validateReq = \Validator::make($request->all(), [
            'username' => 'required',
            'status' => 'required',
        ]);

        if(!$validateReq->fails()){
            $Vtaksasi = new Vtaksasi();
            $data = $Vtaksasi->select('*')
                ->where('id_sap', $request->input('username'))
                ->where('status', $request->input('status'));

            if($data->count() > 0){
                $data_return = $Vtaksasi->select('*')
                    ->where('id_sap', $request->input('username'))
                    ->where('status', $request->input('status'));
                return array(
                    'count' => $data->count(),
                    'data' => $data_return->get(),
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



    public function TaksasiUpdate(Request $request)
    {
        $taksasi = new Taksasi();
        $validateReq = $taksasi->ValidateUpdate($request);
        if(!$validateReq->fails()){
            try{
                $taksasi->TaksasiUpdate($request);
                return array(
                    'msg' => 'update success with id '.$request->input('id_taksasi'),
                    'status' => 'true'
                );
            }catch (Exception $Ex){
                return array(
                    'msg' => 'update error',
                    'error' => $Ex,
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


}