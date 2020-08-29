<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $table="tbl_exam_answer";
    protected $primaryKey="exam_answer_id";
    public $timestamps=false;
}
