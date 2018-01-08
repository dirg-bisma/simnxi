<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/21/2017
 * Time: 6:18 PM
 */

namespace App\Http\Controllers\Setting;


use App\Http\Controllers\Controller;
use App\Model\Publicschema\Vwuserpegawai;
use App\Model\Sap\Pegawai;
use App\Model\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function ListUser()
    {
        $vuserpegawai = new Vwuserpegawai();
        $viewpegawai = $vuserpegawai->get();

        $data['user_pegawai'] = $viewpegawai;

        return view('setting.users.list', $data);
    }

    public function ListUserJson(Request $request)
    {
        $vuserpegawai = new Vwuserpegawai();
        $userpegawai = $vuserpegawai
            ->limit($request->input('length'));
        if($request->input('start') != 0){
            $userpegawai->offset($request->input('start'));
        }
        $q = strtoupper($request->input('search.value'));
        if($q != "")
        {
            $userpegawai->where(\DB::raw('LOWER(nama_pegawai)'), 'LIKE', "%$q%");
        }

        $arr_tak = array();
        $jumlah = 0;
        foreach ($userpegawai->get() as $d){

            $push = array(
                $d->id_sap,
                $d->nama_pegawai,
                $d->position,
                $this->Link($d->id_sap)
            );
            array_push($arr_tak, $push);
            $jumlah++;
        }

        $taksasi_count = new Vwuserpegawai();

        return array(
            'recordsTotal' => $taksasi_count->count(),
            'recordsFiltered' => $jumlah,
            'data' => $arr_tak,
        );
    }

    public function CreateForm()
    {
        return view('setting.users.form');
    }

    public function UpdateForm($id_sap)
    {
        $pegawai = new Pegawai();
        $q = $id_sap;
        $data['pegawai'] = $pegawai->where("id_sap", $q)->first();
        return view('setting.users.form', $data);
    }

    public function Save(Request $request)
    {
        $pegawai = new Users();

        $id_sap = $request->input('id_sap');

        $cek = $pegawai->where('id_sap', $id_sap)->count();
        if($request->input('password') !== $request->input('re_password')){
            return array('msg' => 'password harus sama', 'status' => 'false');
        }else{
            if($request->input('action') == 'create'){
                if($cek == 0){
                    $user = new Users();
                    $user->username = $id_sap;
                    $user->password = md5($request->input('password'));
                    $user->id_sap = $id_sap;
                    $user->save();

                    return array('msg' => 'data tersimpan', 'status' => 'true');
                }else{
                    return array('msg' => 'user telah terdaftar', 'status' => 'false');
                }
            }else{
                $data = array('password' => md5($request->input('password')));
                $user = new Users();
                $user->where('id_sap', $id_sap)->update($data);
                return array('msg' => 'data tersimpan', 'status' => 'true');
            }
        }
    }

    public function JsonSearchPegawai(Request $request)
    {
        $pegawai = new Pegawai();
        $user = new Vwuserpegawai();

        $q = $request->input('id_sap');
        $data = $pegawai->where("id_sap", $q)->first();
        $count = $pegawai->where("id_sap", $q)->count();
        $count_user = $user->where("id_sap", $q)->count();

        return array('count' => $count, 'data' => $data, 'id_sap' => $q, 'exist' => $count_user);
    }

    public function JsonSearchUser(Request $request)
    {
        $user = new Vwuserpegawai();

        $q = $request->input('id_sap');
        $data = $user->where("id_sap", $q)->first();
        $count = $user->where("id_sap", $q)->count();

        return array('count' => $count, 'data' => $data);
    }

    private function Link($id_sap)
    {
        $route = route('setting-users-form-edit', array('id_sap' => $id_sap));
        $str = '<button onclick="$(\'#konten\').load(\''.$route.'\')" class="loaded_konten"><i class="material-icons">mode_edit</i></button>';

        return $str;
    }


}