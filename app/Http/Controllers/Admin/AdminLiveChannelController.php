<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiveChannel;
use Illuminate\Http\Request;

class AdminLiveChannelController extends Controller
{    
    
    public function show(){
        $live_channel_data = LiveChannel::get();
        return view('admin.live_channel_show',compact('live_channel_data'));
    }
    
    public function create(){
        return view('admin.live_channel_create');
    }

    public function store(Request $request){

        $live_channel = new LiveChannel();
      
        $request->validate([
            'video_id' => 'required',
            'heading' => 'required',
        ],[
            'video_id.required' => 'Please type video Id',
            'heading.required' => 'Live channel heading is required',
        ]);

        $live_channel->video_id = $request->video_id;
        $live_channel->heading = $request->heading;
        
        $live_channel->save();
        return redirect()->route('admin_live_channel_show')->with('success_message','Data Created Successfully');
    }
}
