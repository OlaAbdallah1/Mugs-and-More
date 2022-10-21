<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'quantity',
        'color',
        'category',
    ];

    public function cart(){
        return $this->belongsTo(Cart::class); 
    }
    public function purchase_order(){
        return $this->belongsTo(PurchasedOrder::class); 
    }
    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }

    public function images()
    {
     return $this->hasMany(DetailsImages::class);
    }
}
