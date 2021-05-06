<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $table = 'customers';
    protected $guard = 'customer';

    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'company_name', 'customer_firstname', 'customer_lastname', 'customer_email', 'customer_phone',
        'customer_username', 'customer_password', 'customer_status', 'login_ip', 'last_login_at', 'password'
    ];
    protected $hidden = [
        'customer_password', 'remember_token',
    ];
}
