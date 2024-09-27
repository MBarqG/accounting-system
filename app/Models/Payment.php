<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['customer_id', 'amount', 'payment_date', 'type', 'note'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
