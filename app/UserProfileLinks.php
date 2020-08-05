<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfileLinks extends Model
{
    protected $table="tbl_user_profilelinks";
    protected $primaryKey="user_profilelinks_id";
    public $timestamps=false;
}
