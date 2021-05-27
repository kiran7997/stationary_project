<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'order_id', 'user_id', 'role_id','notification_type','is_read','notification_date'
    ];
}
