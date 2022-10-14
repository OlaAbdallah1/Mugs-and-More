<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'product_name',
        'quantity',
        'price',
        'total',
        'user_id',
        'user_name',
    ];
    public function user(){
        return $this->belongsTo(User::class); 
    }
}
