<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $primaryKey = 'cat_id';
    protected $fillable = [
        'cat_id', 'cat_name', 'cat_description', 'created_by','updated_by'
    ];
}
