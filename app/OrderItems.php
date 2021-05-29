<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = "order_items";
    protected $primaryKey = "order_item_id";
    protected $guarded = [
        'order_item_id'
    ];
}
