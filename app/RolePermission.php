<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table="tbl_role_permission";
    protected $primaryKey="role_permission_id";
    public $timestamps=false;
}
