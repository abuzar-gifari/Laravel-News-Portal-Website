<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\Models\Admin;
use App\helper\helper;
use App\Models\Language;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact(){

        helper::read_json();

        if (!session('session_short_name')) {
            $current_short_name = Language::where('is_default','Yes')->first()->short_name;
        }else {
            $current_short_name = session('session_short_name');
        }
        $current_language_id = Language::where('short_name',$current_short_name)->first()->id;
        
        $page_data = Page::where('language_id',$current_language_id)->first();
        return view('front.contact',compact('page_data'));
    }
    
    public function send_email(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }else {
            //send email
            $admin_data = Admin::where('id',1)->first();
            $subject = "Contact Form Email";
            $message = 'Visitor Name: '.$request->name.'<br>';
            $message .= 'Visitor Email: '.$request->email.'<br>';
            $message .= 'Visitor Message: '.$request->message.'<br>';
            /* send the link to the specific user through mailtrap. */
            Mail::to($admin_data->email)->send(new Websitemail($subject,$message));
            return response()->json(['code'=>1,'error_message'=>'Email is Sent']);
        }
    }
}
