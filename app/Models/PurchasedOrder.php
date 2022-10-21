<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedOrder extends Model
{
    use HasFactory;
    protected $table = 'purchased_orders';
    protected $fillable = [
        'quantity',
        'price',
        'total',
        'user_id',
        'product_id'
    ];
  
    public function products(){
        return $this->hasMany(Product::class); 
    }
}
