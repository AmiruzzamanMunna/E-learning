<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $table="tbl_user";
    protected $primaryKey="signup_id";
    public $timestamps=false;
}
