<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $fillable = [
       'body',
       'image',
       'user_id',
       'product_id',
    ];
    public function product(){
        return $this->belongsTo(User::class); 
    }
}
