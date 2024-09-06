<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'receipts';
    protected $fillable = [
        'customer_id',
        'total_amount',
        'payment_method',
        'selected_date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}