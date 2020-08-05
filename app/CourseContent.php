<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    protected $table="tbl_course_content";
    protected $primaryKey="course_content_id";
    public $timestamps=false;
}
