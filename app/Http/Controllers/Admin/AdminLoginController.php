<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminLoginController extends Controller
{
    public function index(){
        // $pass = Hash::make('12345');dd($pass);
        return view('admin.login');
    }

    public function forget_password(){
        return view('admin.layout.forget_password');
    }

    public function admin_login_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // if everything is ok
        $credentials=[
            "email" => $request->email,
            "password" => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            // if credentials are matched
            return redirect()->route('admin_home');
        }else {
            return redirect()->route('admin_login')
            ->with('error','Information is not correct');
        }

    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }

    public function admin_forget_password_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        $admin_data = Admin::where('email',$request->email)->first();
        if (!$admin_data) {
            return redirect()->back()->with('error','Email Not Found');
        }

        /* create a token value */
        // hash() means data is encrypted.
        $token=hash('sha256',time());
        // update in the database
        $admin_data->token = $token;
        $admin_data->update();
        /* create a reset password link */
        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = "Reset Password";
        $message = 'Please click on the link below <br> <a href="'.$reset_link.'">Click Here</a>';
        /* send the link to the specific user through mailtrap. */
        Mail::to($request->email)->send(new Websitemail($subject,$message));
        return redirect()->route('admin_login')->with('success_message','Please check your email and follow the steps here.');
    }

    public function reset_password($token,$email){
        $admin_data = Admin::where('token',$token)->where('email',$email)->first();
        return view('admin.reset_password',compact('token','email'));
    }

    public function admin_reset_password_submit(Request $request){
        // validation
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);
        // catch the data
        $admin_data = Admin::where('token',$request->token)->where('email',$request->email)->first();
        $admin_data->password = Hash::make($request->password);
        // make the token null in that time
        $admin_data->token = "";
        // update the table
        $admin_data->update();
        return redirect()->route('admin_login')->with('success_message','Password Reset Successfully Done!!');
    }
}
