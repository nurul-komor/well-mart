<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryMenTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'delivery_men_id',
        'status'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}