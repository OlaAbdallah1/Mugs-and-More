<?php

namespace App\Http\Controllers\User;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    public function create(Request $purchuse)
    {
        
        Purchase::create([
            'user_id' => auth()->user()->id,
            'area' => $purchuse['area'],
            'postal_code' => $purchuse['postal_code'],
            'shipping_cost' => $purchuse['shipping_cost'],
            'total_cost' => $purchuse['total_cost'],
        ]);
        return redirect('/user/cart')->with('message','Puschased Successfully');

    }
}
