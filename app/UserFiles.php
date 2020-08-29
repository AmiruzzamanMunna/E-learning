<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFiles extends Model
{
    protected $table="tbl_user_submit_file";
    protected $primaryKey="user_submit_file_id";
    public $timestamps=false;
}
