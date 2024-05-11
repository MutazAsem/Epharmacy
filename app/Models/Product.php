<?php

namespace App\Models;

use App\Enums\CountryEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
