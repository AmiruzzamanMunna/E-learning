<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FillExam extends Model
{
    protected $table="tbl_fill_exam";
    protected $primaryKey="fill_exam_id";
    public $timestamps=false;
}
