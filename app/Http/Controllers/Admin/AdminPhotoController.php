<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class AdminPhotoController extends Controller
{
    // show photos page
    public function show(){
        $photos = Photo::get();
        return view('admin.photos',compact('photos'));
    }
    
    // show create photo page
    public function create(){
        return view('admin.photos_create');
    }


    // photo store / submit
    public function store(Request $request){
        // create Photo model object
        $photo = new Photo();
        // validation
        $request->validate([
            'photo' => 'required|image|mimes:png,jpg,jpeg',
            'caption' => 'required',
        ]);
        // for photo upload
        $ext = $request->file('photo')->extension();
        $final_name = 'photo_gallery_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        // send data to the database
        $photo->photo = $final_name;
        $photo->caption = $request->caption;
        // store in the table
        $photo->save();
        return redirect()->route('admin_photo_show')->with('success_message','Data Created Successfully');
    }

    
    // photo edit
    public function edit($id){
        $photo_data = Photo::where('id',$id)->first();
        return view('admin.photos_edit',compact('photo_data'));
    }
    
    // photo update
    public function update(Request $request,$id){
        // create category model object
        $photo = Photo::where('id',$id)->first();
        // validation
        $request->validate([
            'caption' => 'required'
        ]);

        // change photo
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif'
            ]);
            unlink(public_path('uploads/'.$photo->photo));
            $ext = $request->file('photo')->extension();
            $final_name = 'photo_gallery_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $photo->photo = $final_name;
        }

        // send data to the database
        $photo->caption = $request->caption;
        // update the table
        $photo->update();
        return redirect()->route('admin_photo_show')->with('success_message','Data Updated Successfully');
    }

    // photo delete
    public function delete($id){
        $photo_data = Photo::where('id',$id)->first();
        $photo_data->delete();
        return redirect()->route('admin_photo_show')->with('success_message','Data is Deleted Successfully');
    }
}
