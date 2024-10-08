<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $fillable = ['customer_id', 'amount', 'debt_date', 'type', 'note'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
