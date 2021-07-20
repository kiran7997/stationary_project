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
        'company_name', 'customer_firstname', 'customer_lastname', 'email', 'customer_phone',
        'username', 'password', 'customer_status', 'login_ip', 'last_login_at', 'deleted',
        'otp','sms_verification','customer_profile_image','state_id','district_id','sub_district',
        'fps_id','latitude','longitude','accuracy'
    ];
    protected $hidden = [
        'customer_password', 'remember_token',
    ];
}
