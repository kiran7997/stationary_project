<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aproducts extends Model
{
    protected $primaryKey = "product_id";
    protected $table = "aproducts";
    protected $fillable = [
        'product_id', 'product_name', 'cat_id', 'unit_id', 'variation_id',
        'image_url', 'description', 'base_price', 'code', 'taxable', 'threshold_qty', 'brand', 'inner_carton', 'actual_mrp', 'fps_mrp', 'deleted', 'created_by', 'updated_by'
    ];
}
