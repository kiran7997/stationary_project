<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    protected $primaryKey = "order_id";
    protected $guarded = [
        'order_id'
    ];
}
