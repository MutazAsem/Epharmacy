<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'plate_number','vehicle_type','delivery_id',
    ];

    public function delivery_vehicle ():BelongsTo
    {
        return $this->belongsTo(User::class,'delivery_id');
    }
}
