<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminAuthorController extends Controller
{
    
    public function show(){
        $authors = Author::get();
        return view('admin.author_show',compact('authors'));
    }
    
    public function create(){
        return view('admin.author_create');
    }


    public function store(Request $request){
        // dd($request->all());

        $author = new Author();
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:authors',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        // send data to the database
        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        
        // photo
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif'
            ]);
            
            // get the extension 
            $ext = $request->file('photo')->extension();

            $final_name = 'author_photo_'.time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $author->photo = $final_name;
        }

        $author->token = "";

        $author->save();

        //send email
        $subject = "Your Account is created!";
        $message = 'Hi, Your account is created. Please login as a author to our site.<br>';
        $message .= '<a href="'.route('login').'">';
        $message .= 'Click this link';
        $message .= '</a><br><br>';
        $message .= 'See your password and after login please change your password.<br>';
        $message .= $request->password;
        
        Mail::to($request->email)->send(new Websitemail($subject,$message));
        
        return redirect()->route('admin_author_show')->with('success_message','Author Account Created Successfully');
    }
}
