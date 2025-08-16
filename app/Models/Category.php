<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Item;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['cat_name', 'description', 'updated_at', 'deleted_at'];
    protected $dates = ['deleted_at'];
    public function items()
    {
        return $this->hasMany(Item::class); //relasi ke tabel items dimana 1 kategori memiliki banyak item
    }
}
