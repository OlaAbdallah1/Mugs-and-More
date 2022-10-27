<?php

namespace App\Http\Controllers\User;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function create(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $image =  $request->file('image');
            $filename = $image->store('', ['disk' => 'feedbacks']);
            $validatedData['image'] = $filename;
        }
        $feedback=new Feedback;
        $feedback->user_id=Auth::user()->id;
        $feedback->product_id = $id;
        $feedback->body = $request['feedback'];
        $feedback->image = $request['image'];
        $feedback->save();
        // Feedback::create([
        //     'user_id' => Auth::user()->id,
        //     'product_id' => $id,
        //     'body' => $request['feedback'],
        //     'image' => $request['image']
        // ]);
        return redirect()->back()->with('success', "Feedback Added");
    }
    
}
