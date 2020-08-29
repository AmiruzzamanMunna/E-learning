<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menues extends Model
{
    protected $table="tbl_menu";
    protected $primaryKey="menu_id";
    public $timestamps=false;
}
