<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table="tbl_notification";
    protected $primaryKey="notification_id";
    public $timestamps=false;
}
