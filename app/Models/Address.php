<?php

namespace App\Models;

use App\Enums\CityEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','city','address_link','user_id',
    ];


    protected $casts = [
        'city' => CityEnum::class,
    ];

    public function user_address ():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }




}
