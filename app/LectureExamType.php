<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureExamType extends Model
{
    protected $table="tbl_lecture_exam";
    protected $primaryKey="lecture_exam_id";
    public $timestamps=false;
}
