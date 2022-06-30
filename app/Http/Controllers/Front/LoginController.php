<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
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
}
