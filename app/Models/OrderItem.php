<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;
use App\Models\Item;

class OrderItem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'order_id',
        'item_id',
        'quantity',
        'price',
        'tax',
        'total_price',
        'subtotal',
        'updated_at', 
        'deleted_at'
    ];
    
    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->belongsTo(Order::class); // Relasi ke tabel orders dimana 1 order item dimiliki oleh 1 order
    }

    public function item()
    {
        return $this->belongsTo(Item::class); // Relasi ke tabel items dimana 1 order item memiliki 1 item
    }
}
