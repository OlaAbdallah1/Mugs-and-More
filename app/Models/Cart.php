<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'carts';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'product_id',
        'product_name',
        'quantity',
        'price',
        'total',
        'user_id',
        'user_name',
        'image',
    ];
   

    public function products(){
        return $this->hasMany(Product::class); 
    }
}
