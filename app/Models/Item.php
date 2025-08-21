<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Item extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['name', 'description', 'price', 'category_id', 'img', 'is_active', 'updated_at', 'deleted_at'];
    protected $dates = ['deleted_at'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // Relasi ke tabel categories dimana 1 item memiliki 1 kategori
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class); // Relasi ke tabel order_items dimana 1 item memiliki banyak order item
    }
}
