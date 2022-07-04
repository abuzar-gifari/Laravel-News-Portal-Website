<?php

namespace App\Http\Controllers\Front;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Models\OnlinePoll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function submit(Request $request)
    {
        $poll_result = OnlinePoll::where('id',$request->id)->first();

        if ($request->vote == "Yes") {
            $total = $poll_result->yes_vote+1;
            $poll_result->yes_vote = $total;
        }else {
            $total = $poll_result->no_vote+1;
            $poll_result->no_vote = $total;
        }
        $poll_result->update();

        session()->put('current_poll_id',$poll_result->id);
        // current poll id 4

        return redirect()->back()->with('success_message','Voted Successfully');
    }

    public function previous_poll_result()
    {
        
        helper::read_json();

        $online_poll_data = OnlinePoll::orderBy('id','desc')->get();
        return view('front.poll_previous',compact('online_poll_data'));
    }
}
