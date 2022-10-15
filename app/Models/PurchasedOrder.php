<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedOrder extends Model
{
    use HasFactory;
    protected $table = 'purchased_orders';
    protected $fillable = [
        'product_name',
        'quantity',
        'price',
        'total',
        'user_id',
        'user_name',
        'image'
    ];
    public function user(){
        return $this->belongsTo(User::class); 
    }
}
