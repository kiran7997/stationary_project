<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventeries extends Model
{
    protected $primaryKey="inventory_id";
    protected $table="inventeries";
    protected $fillable = ['inventory_id','supplier_id','product_id','quantity','invntory_status','deleted','created_by','updated_by'];
}
