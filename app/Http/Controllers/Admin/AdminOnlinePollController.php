<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnlinePoll;
use Illuminate\Http\Request;

class AdminOnlinePollController extends Controller
{
      
    // show online poll page
    public function show(){
        $online_poll_data = OnlinePoll::with('rLanguage')->orderBy('id','desc')->get();
        return view('admin.online_poll',compact('online_poll_data'));
    }
    
    // show create online poll page
    public function create(){
        return view('admin.online_poll_create');
    }


    // online poll store / submit
    public function store(Request $request){

        $online_poll = new OnlinePoll();
        // validation
        $request->validate([
            'question' => 'required',
        ]);

        // send data to the database
        $online_poll->question = $request->question;
        $online_poll->yes_vote = 0;
        $online_poll->no_vote = 0;
        $online_poll->language_id = $request->language_id;
        $online_poll->save();
        return redirect()->route('admin_online_poll_show')->with('success_message','Data Created Successfully');
    }

    
    // online poll edit
    public function edit($id){
        $online_poll_data = OnlinePoll::with('rLanguage')->where('id',$id)->first();
        return view('admin.online_poll_edit',compact('online_poll_data'));
    }
    
    // online poll update
    public function update(Request $request,$id){

        $online_poll = OnlinePoll::where('id',$id)->first();
        // validation
        $request->validate([
            'question' => 'required',
        ]);

        $online_poll->question = $request->question;
        $online_poll->language_id = $request->language_id;
        $online_poll->update();
        return redirect()->route('admin_online_poll_show')->with('success_message','Data Updated Successfully');
    }

    // online poll delete
    public function delete($id){
        $online_poll_data = OnlinePoll::where('id',$id)->first();
        $online_poll_data->delete();
        return redirect()->route('admin_online_poll_show')->with('success_message','Data is Deleted Successfully');
    }  
}
