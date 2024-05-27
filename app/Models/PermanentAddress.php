<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermanentAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'country',
        'province',
        'district',
        'city',
        'area',
        'address',
        'postal_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
