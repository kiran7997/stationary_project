<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addToCart extends Model
{
    
    protected $table="add_to_carts";
    protected $fillable = [
        'cart_id', 'product_id', 'customer_id', 'created_by','updated_by'
    ];
}
