<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    protected $table="tbl_exam_type";
    protected $primaryKey="exam_type_id";
    public $timestamps=false;
}
