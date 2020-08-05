<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table="tbl_permission";
    protected $primaryKey="permission_id";
    public $timestamps=false;
}
