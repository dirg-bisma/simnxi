<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 1/4/2018
 * Time: 3:26 PM
 */

namespace App\Model\Sap;


use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'sap.pegawai';
    protected $primaryKey = 'id_sap';
    public $timestamps = false;
}