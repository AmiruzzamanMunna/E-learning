<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForgetPassword extends Model
{
    protected $table="tbl_forget_password";
    protected $primaryKey="forget_password_id";
    public $timestamps=false;
}
