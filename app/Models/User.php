<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'phone',
        'address',
        'role',
        'status',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function delivery()
    {
        return $this->hasOne(DeliveryAddress::class);
    }
    public function temporary_address()
    {
        return $this->hasOne(TemporaryAddress::class);
    }
    public function permanent_address()
    {
        return $this->hasOne(PermanentAddress::class);
    }
    public function payment()
    {
        return $this->hasMany(Payments::class);
    }
}
