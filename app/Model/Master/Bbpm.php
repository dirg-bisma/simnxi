<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/20/2017
 * Time: 9:24 PM
 */

namespace App\Model\Master;


use Illuminate\Database\Eloquent\Model;

class Bbpm extends Model
{
    protected $table = 'master.bbpm';
    protected $primaryKey = 'id_bbpm';

    public $timestamps = false;
}