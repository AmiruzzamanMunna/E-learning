<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureFiles extends Model
{
    protected $table="tbl_lecture_files";
    protected $primaryKey="lecture_files_id";
    public $timestamps=false;
}
