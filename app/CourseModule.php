<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseModule extends Model
{
    protected $table="tbl_course_module";
    protected $primaryKey="course_module_id";
    public $timestamps=false;
}
