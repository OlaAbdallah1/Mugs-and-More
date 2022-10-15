<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';

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
