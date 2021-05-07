<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    protected $primaryKey="stock_id";
    protected $table="stocks";
    protected $fillable = ['stock_id','product_id','item_quantity','deleted','created_by','updated_by'];
    
}
