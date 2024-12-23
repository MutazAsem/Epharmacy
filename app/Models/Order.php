<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable = [
        'client_id','status','payment_method','address_id','total_price','delivery_id','note'
    ];

    protected $casts = [
        'status' => OrderStatusEnum::class,
    ];

    public function client_order ():BelongsTo
    {
        return $this->belongsTo(User::class,'client_id');
    }

    public function order_delivery ():BelongsTo
    {
        return $this->belongsTo(User::class,'delivery_id');
    }



    public function order_address ():BelongsTo
    {
        return $this->belongsTo(Address::class,'address_id');
    }

    public function order_item ():HasMany
    {
        return $this->hasMany(OrderItem::class,'order_id');
    }
    
}
