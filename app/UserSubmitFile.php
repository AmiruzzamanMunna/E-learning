<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubmitFile extends Model
{
    protected $table="tbl_user_submit_form";
    protected $primaryKey="user_submit_form_id";
    public $timestamps=false;
}
