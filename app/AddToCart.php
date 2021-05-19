<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    protected $table="add_to_carts";
    protected $fillable = [
        'cart_id', 'product_id', 'customer_id', 'quantity', 'product_price', 'amount', 'created_by', 'updated_by'
    ];
}
