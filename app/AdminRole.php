<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $table="tbl_adminrole";
    protected $primaryKey="adminrole_id";
    public $timestamps=false;
}
