<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Role extends Model
{
    use SoftDeletes;
    protected $fillable = ['role_name', 'description', 'updated_at', 'deleted_at'];
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany(User::class); // Relasi ke tabel users dimana 1 role memiliki banyak user
    }
}
