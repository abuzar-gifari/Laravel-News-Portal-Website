<?php

namespace App\Http\Controllers\Front;

use App\helper\helper;
use App\Models\Page;
use App\Models\Author;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index(){
        helper::read_json();
        $page_data = Page::where('id',1)->first();
        return view('front.login',compact('page_data'));
    }

    public function login_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // if everything is ok
        $credentials=[
            "email" => $request->email,
            "password" => $request->password,
        ];

        if (Auth::guard('author')->attempt($credentials)) {
            // if credentials are matched
            return redirect()->route('author_home');
        }else {
            return redirect()->route('login')
            ->with('error','Information is not correct');
        }

    }

    public function logout(){
        Auth::guard('author')->logout();
        return redirect()->route('login');
    }


    public function forget_password(){
        helper::read_json();
        return view('front.forget_password');
    }


    public function forget_password_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $author_data = Author::where('email',$request->email)->first();
        if (!$author_data) {
            return redirect()->back()->with('error','Email Not Found');
        }

        /* create a token value */
        // hash() means data is encrypted.
        $token=hash('sha256',time());
        // update in the database
        $author_data->token = $token;
        $author_data->update();
        /* create a reset password link */
        $reset_link = url('reset-password/'.$token.'/'.$request->email);
        $subject = "Reset Password";
        $message = 'Please click on the link below <br> <a href="'.$reset_link.'">Click Here</a>';

        Mail::to($request->email)->send(new Websitemail($subject,$message));
        return redirect()->route('login')->with('success_message','Please check your email and follow the steps here.');
    }

    public function reset_password($token,$email){
        helper::read_json();
        $author_data = Author::where('token',$token)->where('email',$email)->first();
        return view('front.reset_password',compact('token','email'));
    }

    public function reset_password_submit(Request $request){
        // validation
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);
        // catch the data
        $author_data = Author::where('token',$request->token)->where('email',$request->email)->first();
        $author_data->password = Hash::make($request->password);
        // make the token null in that time
        $author_data->token = "";
        // update the table
        $author_data->update();
        return redirect()->route('login')->with('success_message','Password Reset Successfully Done!!');
    }
}
