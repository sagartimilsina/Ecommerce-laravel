<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'date',
        'order_status',
        'esewa_status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
    public function payment()
    {
        return $this->hasOne(Payments::class, 'order_id'); // Ensure the foreign key is correctly referenced
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
