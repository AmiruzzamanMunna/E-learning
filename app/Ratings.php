<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $table="tbl_ratings";
    protected $primaryKey="ratings_id";
    public $timestamps=false;
}
