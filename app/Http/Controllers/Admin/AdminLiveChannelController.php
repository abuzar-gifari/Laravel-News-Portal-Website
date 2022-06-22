<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiveChannel;
use Illuminate\Http\Request;

class AdminLiveChannelController extends Controller
{    
    // show videos page
    public function show(){
        $live_channel_data = LiveChannel::get();
        return view('admin.live_channel_show',compact('live_channel_data'));
    }
    
    // show create video page
    public function create(){
        return view('admin.live_channel_create');
    }


    // video store / submit
    public function store(Request $request){

        $live_channel = new LiveChannel();
        // validation
        $request->validate([
            'video_id' => 'required',
            'heading' => 'required',
        ]);

        // send data to the database
        $live_channel->video_id = $request->video_id;
        $live_channel->heading = $request->heading;
        // store in the table
        $live_channel->save();
        return redirect()->route('admin_live_channel_show')->with('success_message','Data Created Successfully');
    }

    
    // // video edit
    // public function edit($id){
    //     $video_data = Video::where('id',$id)->first();
    //     return view('admin.videos_edit',compact('video_data'));
    // }
    
    // // video update
    // public function update(Request $request,$id){
    //     // create category model object
    //     $video = Video::where('id',$id)->first();
    //     // validation
    //     $request->validate([
    //         'video_id' => 'required',
    //         'caption' => 'required',
    //     ]);

    //     // send data to the database
    //     $video->video_id = $request->video_id;
    //     $video->caption = $request->caption;
    //     // update the table
    //     $video->update();
    //     return redirect()->route('admin_video_show')->with('success_message','Data Updated Successfully');
    // }

    // // video delete
    // public function delete($id){
    //     $video_data = Video::where('id',$id)->first();
    //     $video_data->delete();
    //     return redirect()->route('admin_video_show')->with('success_message','Data is Deleted Successfully');
    // }
}
