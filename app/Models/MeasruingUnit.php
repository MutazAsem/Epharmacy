<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MeasruingUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function product_unit ():HasMany
    {
        return $this->hasMany(ProductMeasurementUnit::class,'measurement_units_id');
    }

    //
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_measurement_units', 'measurement_units_id', 'product_id');
    }
    
    

}
