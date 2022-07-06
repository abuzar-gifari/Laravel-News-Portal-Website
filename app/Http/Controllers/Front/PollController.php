<?php

namespace App\Http\Controllers\Front;

use App\helper\helper;
use App\Models\Language;
use App\Models\OnlinePoll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        // fetch the session language
        if (!session()->get('session_short_name')) {
            $current_short_name = Language::where('is_default','Yes')->first()->short_name; 
        }else {
            $current_short_name = session()->get('session_short_name');
        }
        $current_language_id = Language::where('short_name',$current_short_name)->first()->id;
        //dd($current_language_id);
        
        $online_poll_data = OnlinePoll::where('language_id',$current_language_id)->orderBy('id','desc')->get();
        return view('front.poll_previous',compact('online_poll_data'));
    }
}
