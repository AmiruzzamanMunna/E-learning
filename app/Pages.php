<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table="tbl_pages";
    protected $primaryKey="pages_id";
    public $timestamps=false;
}
