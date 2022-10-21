<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOperation extends Model
{
    use HasFactory;
    protected $table = 'purchase_operations';

    protected $fillable = [
        'area',
        'postal_code',
        'shipping_cost',
        'total_cost',
        'status',
        'user_id',
    ];
  
}
