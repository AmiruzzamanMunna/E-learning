<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table="tbl_course";
    protected $primaryKey="course_id";
    public $timestamps=false;
}
