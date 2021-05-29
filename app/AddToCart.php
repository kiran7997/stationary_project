<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    protected $table="add_to_carts";
    protected $primaryKey = "cart_id";
    protected $guarded = [
        'cart_id'
    ];
}
