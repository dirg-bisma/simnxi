<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'setting.users';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
