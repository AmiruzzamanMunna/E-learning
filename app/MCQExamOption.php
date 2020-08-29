<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCQExamOption extends Model
{
    protected $table="tbl_mcq_option";
    protected $primaryKey="mcq_option_id";
    public $timestamps=false;
}
