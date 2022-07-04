<?php

namespace App\Http\Controllers\Admin;

use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdminSubscriberController extends Controller
{
    public function show_all(){
        $subscribers_data = Subscriber::where('status','Active')->get();
        return view('admin.subscriber_all',compact('subscribers_data'));
    }
    
    public function send_email(){
        return view('admin.subscriber_send_email');
    }
    
    public function send_email_submit(Request $request){
    
        
        $subject = $request->subject;
        $message = $request->message;

        // get all the active subscribers
        $subscribers = Subscriber::where('status','Active')->get();

        // send messages to all subscribers
        foreach($subscribers as $row){
        
            Mail::to($row->email)->send(new Websitemail($subject,$message));
        
        }
        return redirect()->back()->with('success_message','Successfully sent!');

    }
}
