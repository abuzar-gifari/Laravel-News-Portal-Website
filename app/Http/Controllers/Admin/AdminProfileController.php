<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function admin_edit_profile(){
        return view('admin.profile');
    }
    
    public function edit_profile_submit(Request $request){
        // get the admin data from database
        $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();
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
            $admin_data->password = Hash::make($request->password);
        }
        // echo "<pre>";print_r($admin_data);die;
        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();
        return redirect()->back()->with('success_message','Profile Information is Updated Successfully');

    }
}
