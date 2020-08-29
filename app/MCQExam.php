<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCQExam extends Model
{
    protected $table="tbl_mcq_exam";
    protected $primaryKey="mcq_exam_id";
    public $timestamps=false;
}
