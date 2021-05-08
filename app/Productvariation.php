<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productvariation extends Model
{
    protected $primaryKey = 'variation_id';
    protected $fillable = [
        'variation_name' ,'variation_abbrevation','add_on_price'
     ];
}
