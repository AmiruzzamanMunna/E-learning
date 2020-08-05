<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseOrder extends Model
{
    protected $table="tbl_order";
    protected $primaryKey="order_id";
    public $timestamps=false;
}
