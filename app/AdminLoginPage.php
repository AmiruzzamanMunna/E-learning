<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminLoginPage extends Model
{
    protected $table="tbl_admin_login_page";
    protected $primaryKey="admin_login_page_id";
    public $timestamps=false;
}
