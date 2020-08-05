<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table="tbl_coupon";
    protected $primaryKey="coupon_id";
    public $timestamps=false;
}
