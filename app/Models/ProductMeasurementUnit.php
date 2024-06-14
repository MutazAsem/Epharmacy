<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductMeasurementUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'measurement_units_id','product_id','quantity','price',
    ];

    public function product_measuremen ():BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function product_unit ():BelongsTo
    {
        return $this->BelongsTo(MeasruingUnit::class,'measurement_units_id');
    }

    
}
