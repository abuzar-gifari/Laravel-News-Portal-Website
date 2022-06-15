<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
    
    // show videos page
    public function show(){
        $videos = Video::get();
        return view('admin.videos',compact('videos'));
    }
    
    // show create video page
    public function create(){
        return view('admin.videos_create');
    }


    // video store / submit
    public function store(Request $request){

        $video = new Video();
        // validation
        $request->validate([
            'video_id' => 'required',
            'caption' => 'required',
        ]);

        // send data to the database
        $video->video_id = $request->video_id;
        $video->caption = $request->caption;
        // store in the table
        $video->save();
        return redirect()->route('admin_video_show')->with('success_message','Data Created Successfully');
    }

    
    // video edit
    public function edit($id){
        $video_data = Video::where('id',$id)->first();
        return view('admin.videos_edit',compact('video_data'));
    }
    
    // video update
    public function update(Request $request,$id){
        // create category model object
        $video = Video::where('id',$id)->first();
        // validation
        $request->validate([
            'video_id' => 'required',
            'caption' => 'required',
        ]);

        // send data to the database
        $video->video_id = $request->video_id;
        $video->caption = $request->caption;
        // update the table
        $video->update();
        return redirect()->route('admin_video_show')->with('success_message','Data Updated Successfully');
    }

    // video delete
    public function delete($id){
        $video_data = Video::where('id',$id)->first();
        $video_data->delete();
        return redirect()->route('admin_video_show')->with('success_message','Data is Deleted Successfully');
    }
}
