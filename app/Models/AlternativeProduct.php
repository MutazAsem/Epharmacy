<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlternativeProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id','alternativ_product_id'
    ];


    public function product_alternativ ():BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
