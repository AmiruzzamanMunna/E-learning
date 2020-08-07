<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table="tbl_blog";
    protected $primaryKey="blog_id";
    public $timestamps=false;
}
