<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'order_id','product_id','quantity','measurement_units_id','unit_price','total_product_price',
    ];

    public function order_product_item ():BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function order_measurement_unit ():BelongsTo
    {
        return $this->belongsTo(ProductMeasurementUnit::class,'measurement_units_id');
    }

    public function order_item ():BelongsTo
    {
        return $this->belongsTo(Order::class,'order_id');
    }
}
