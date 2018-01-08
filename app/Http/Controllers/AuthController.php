<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/13/2017
 * Time: 8:29 PM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\Users;
use App\Model\Vuserpegawai;
use App\Model\Pegawai;


class AuthController extends Controller
{
    public function Login(Request $request)
    {
        $Users = new Users();
        $Vuserpegawai = new Vuserpegawai();
        $validatedData = \Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');
        $device_id = $request->input('device_id');
        if(!$validatedData->fails()){
            $user = $Users->select(array('id'))
                ->where('username', $username)
                ->where('password', md5($password));
            if($user->count() > 0){
                $Users->where('username', $username)
                    ->update(array(
                        'api_token'=>str_random(40),
                        'device_id' => $device_id,
                        'last_login' => date('Y-m-d H:i:s')
                    ));

                $user_return = $Users->select(array('id', 'username', 'id_sap', 'api_token'))
                    ->where('username', $username)->first();

                $vuserpegawai = $Vuserpegawai->where('id_sap', $user_return->id_sap)->first();

                return array(
                    'data' => $vuserpegawai,
                    'msg' => 'success',
                    'status' => 'true'
                );
            }else{
                $msg = array(
                    'msg' => 'username or password combination wrong.',
                    'status' => 'false'
                );
                return $msg;
            }
        }else{
            $msg = array(
                'msg' => 'username or password required',
                'status' => 'false'
            );
            return $msg;
        }
    }

    public function Register(Request $request)
    {
        $Users = new Users();
        $validatedData = \Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            're_password' => 'required|min6'
        ]);

        if(!$validatedData->fails()){
            $validatePegawai = $this->ValidatePegawai($request->input('username'));
            if($validatePegawai[0]){
                $validateUser = $this->ValidateUser($request->input('username'));
                if(!$validateUser[0]){
                    $Users->username = $request->input('username');
                    $Users->password = $request->input('password');
                    $Users->id_sap = $request->input('username');
                    $Users->save();
                    return array('msg' => 'user registered.', 'status' => 'true');
                }else{
                    return array('msg' => 'user exist.', 'status' => 'false');
                }
            }else{
                return array('msg' => 'pegawai not exist.', 'status' => 'false');
            }
        }
    }

    public function ValidateRegister($id_sap)
    {
        $Users = new Users();
        $user = $Users->where('id_sap', $id_sap)->count();

        if($user > 0){
            $validate = $this->ValidatePegawai($id_sap);
            if($validate[0]){

                return array(
                    'data' => $validate[1],
                    'msg' => 'Users has been Register.',
                    'status' => 'true',
                    'param' => $id_sap
                );
            }
        }else{
            return array('msg' => 'Users not Registered', 'status' => 'false');
        }
    }

    private function ValidateUser($id_sap)
    {
        $Users = new Users();
        $user = $Users->where('id_sap', $id_sap)->count();

        if($user > 0){
            return true;
        }else{
            return false;
        }
    }

    private function ValidatePegawai($id_sap)
    {
        $pegawai = new Pegawai();
        $count = new Pegawai();
        $pegawai->where('id_sap', $id_sap)->get();

        if($count->where('id_sap', $id_sap)->count() > 0){
            return array(true, $pegawai);
        }else{
            return array(false);
        }
    }


}