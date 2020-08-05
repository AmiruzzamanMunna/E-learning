<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table="tbl_wishlist";
    protected $primaryKey="wishlist_id";
    public $timestamps=false;
}
