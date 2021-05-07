<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'company_name' ,'customer_firstname','customer_lastname','customer_email','customer_phone',
        'customer_username','customer_password','customer_status','login_ip','last_login_at'
     ];
    
}
