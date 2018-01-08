<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 1/4/2018
 * Time: 2:14 PM
 */
namespace App\Model\Publicschema;

use Illuminate\Database\Eloquent\Model;

class Vwuserpegawai extends Model
{
    protected $table = 'public.v_user_pegawai';
    protected $primaryKey = 'id';
    public $timestamps = false;
}