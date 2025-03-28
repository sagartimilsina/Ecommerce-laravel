<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'product_name',
        'product_code',
        'product_description',
        'product_price',
        'product_image',
        'product_quantity',
        'product_status',
        'product_discount',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function order()
    {
        return $this->hasMany(Orders::class);
    }

    public function payment(){

        return $this->hasOne(Payments::class);
    }
    
   
}
