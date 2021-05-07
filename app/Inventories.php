<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventories extends Model
{
    protected $primaryKey="inventory_id";
    protected $table="inventories";
    protected $fillable = ['inventory_id','inventory_name','inventory_address','inventory_contact',
    'inventory_email','product_id','quantity','invntory_status','deleted','created_by','updated_by'];
}