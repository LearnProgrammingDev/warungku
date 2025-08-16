<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\Order;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    
    protected $fillable = [
        'username',
        'email',
        'password',
        'role_id',
        'phone',
        'created_at',
        'updated_at',
    ];
    protected $dates = ['deleted_at'];

    public function role()
    {
        return $this->belongsTo(Role::class); // Relasi ke tabel roles dimana 1 user memiliki 1 role
    }
    public function orders()
    {
        return $this->hasMany(Order::class); // Relasi ke tabel orders dimana 1 user memiliki banyak order
    }
    

    
}
