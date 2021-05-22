<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table="suppliers";
    protected $fillable = ['supplier_id','supplier_companyname','supplier_address','supplier_contact',
    'supplier_email','deleted','created_by','updated_by'];
}
