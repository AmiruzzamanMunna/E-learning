<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table="tbl_homepage";
    protected $primaryKey="homepage_id";
    public $timestamps=false;
}
