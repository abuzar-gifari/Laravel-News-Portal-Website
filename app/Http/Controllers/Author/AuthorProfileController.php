<?php

namespace App\Http\Controllers\Author;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorProfileController extends Controller
{
    public function author_edit_profile(){
        return view('author.profile');
    }

    public function author_edit_profile_submit(Request $request){
        // get the admin data from database
        $author_data = Author::where('email',Auth::guard('author')->user()->email)->first();
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        // if password is given,
        if ($request->password!="") {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $author_data->password = Hash::make($request->password);
        }

         // photo upload
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif'
            ]);
            unlink(public_path('uploads/'.$author_data->photo));
            $ext = $request->file('photo')->extension();
            $final_name = 'author_photo_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $author_data->photo = $final_name;
        }

        // echo "<pre>";print_r($admin_data);die;
        $author_data->name = $request->name;
        $author_data->email = $request->email;
        $author_data->update();
        return redirect()->back()->with('success_message','Profile Information is Updated Successfully');

    }
}
