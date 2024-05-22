<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancellations extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'product_id',
        'cancellation_date',
        'cancellation_reason',
        'cancellation_status',

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product(){
       return $this->belongsTo(Product::class, 'product_id'); 
    }
    public function order(){
        return $this->belongsTo(Orders::class, 'order_id');
    }
}
