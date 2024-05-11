<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductMeasurementUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','measurement_units_id','product_id','quantity','price',
    ];

    public function product_measuremen ():BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
