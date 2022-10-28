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
        'quantity',
        'total',
        'user_id',
    ];
   
    public function products(){
        return $this->hasMany(Product::class); 
    }

    public function purchase(){
        return $this->belongsTo(Purchase::class); 
    }
}
