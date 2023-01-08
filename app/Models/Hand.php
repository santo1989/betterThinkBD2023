<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hand extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentHistory()
    {
        return $this->hasMany(PaymentHistory::class);
    }

    
}
