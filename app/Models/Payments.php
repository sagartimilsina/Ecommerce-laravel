<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $fillable = [
        //     'order_id',
        //     'user_id',
        //     'product_id',
        //     'payment_method',
        //     'payment_status',
        //     'payment_amount',
        //     'payment_date',
        //     'payment_proof',
        'user_id',
        'order_id',
        'product_id',
        'transaction_uuid',
        'transaction_code',
        'payment_amount',
        'signature',
        'quantity',
        'payment_method',
        'payment_date',
        'payment_status',
        'status',
        'payment_proof',
        'product_code',

    ];
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
