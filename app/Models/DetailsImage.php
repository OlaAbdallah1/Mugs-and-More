<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class DetailsImage extends Model
{
    use HasFactory;
    protected $table = 'details_images';

    protected $fillable = [
        'detail_image',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
