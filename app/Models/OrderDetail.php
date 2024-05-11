<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'order_id','product_id','total_quantity','product_measurement_units_id','total_product_price',
    ];

    public function order_product_detail ():BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function order_product_measurement_unit ():BelongsTo
    {
        return $this->belongsTo(ProductMeasurementUnit::class,'product_measurement_units_id');
    }
}
