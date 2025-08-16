<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    protected $fillable = [
        'order_code',
        'user_id',
        'subtotal',
        'tax',
        'grand_total',
        'status',
        'table_number',
        'payment_method',
        'note', 'updated_at', 'deleted_at'
    ];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class); // Relasi ke tabel users dimana 1 order dimiliki oleh 1 user
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class); // Relasi ke tabel order_items dimana 1 order memiliki banyak order item
    }

}
