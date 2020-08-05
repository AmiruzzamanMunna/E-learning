<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $table="tbl_course_category";
    protected $primaryKey="course_category_id";
    public $timestamps=false;
}
