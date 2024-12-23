<?php

namespace App\Models;

use App\Enums\CountryEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','category_id','state','made_in','image','manufacture_company',
        'type','effective_material','indications','dosage','side_effects',
        'contraindications','packaging','storage','status'
    ];

    protected $casts = [
        'made_in' => CountryEnum::class,
    ];
    

    public function product_category ():BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function product_measuremen ():HasMany
    {
        return $this->HasMany(ProductMeasurementUnit::class,'product_id');
    }

    public function alternativ_product ():BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'alternative_products', 'product_id', 'alternativ_product_id');
    }

    //
    public function measurementUnits()
    {
        return $this->belongsToMany(MeasruingUnit::class, 'product_measurement_units', 'product_id', 'measurement_units_id');
    }
    
    

}
