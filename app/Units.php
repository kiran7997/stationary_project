<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model

{
    protected $primaryKey='unit_id';
    protected $fillable = [
       'unit_name' ,'unit_description'
    ];
}