<?php

namespace App\Http\Controllers\User;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FeedbackController extends Controller
{
    public function add_feedback($id)
    {
        // لنفس البرودكت الاي دي عشان كل برودكت يكون انه فيدباكات check it 
        //اعملي العلاقات بين فيد باك وبرودكت 
        //فيد باكس تيبل 
        //فييد باك موديل 
        //فيد باك كونترولر وانقلي هاد الفنكشن 
        //
    }
    public function delete_feedback($id)
    {
        
    }

    public function edit_feedback($id)
    {
    }
    public function show_feedbacks(){
        $feedbacks= Feedback::all();
        return view('user.feedbacks.index')->with('feedbacks',$feedbacks);
    }
}
