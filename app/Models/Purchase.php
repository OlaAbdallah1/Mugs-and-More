<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table = 'purchases';

    protected $fillable = [
        'user_id',
        'purchased_operation_id',
        'cart_id'
    ];

    public function carts(){
        return $this->hasMany(Cart::class); 
    }
    
    public function purchaseOperation(){
        return $this->belongsTo(PurchaseOperation::class); 
    }
}
