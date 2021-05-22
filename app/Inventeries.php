<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventeries extends Model
{
    protected $table="inventeries";
    protected $fillable = ['inventory_id','inventory_name','product_id','quantity','invntory_status','deleted','created_by','updated_by'];
}
