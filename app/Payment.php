<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table="payment";
    protected $primaryKey="id";
    public $timestamps=true;
}
