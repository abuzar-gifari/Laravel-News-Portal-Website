<?php

namespace App\Http\Controllers\Front;

use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function index(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email'
        ]);
        if (!$validator->passes()) {
            return response()->json(['code'=>0,'error_message'=>$validator->errors()->toArray()]);
        }else {

            $token = hash('sha256',time());
            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->token = $token;
            $subscriber->status = "Pending";
            $subscriber->save();

            $verification_link = url('/subscriber/verify/'.$token.'/'.$request->email);
            
            $subject = "Subscriber Email Verify";
            $message = 'Please click on the following link in order to verify as a subscriber<br>';
            $message .= '<a href="'.$verification_link.'">';
            $message .= $verification_link;
            $message .= '</a>';

            /* send the link to the specific user through mailtrap. */
            Mail::to($request->email)->send(new Websitemail($subject,$message));
            return redirect()->back()->with('success_message','Please check your email');
        }
    }

    // Verify Subscribers
    public function verify($token,$email){
        $subscriber_data = Subscriber::where('token',$token)->where('email',$email)->first();
        if ($subscriber_data) {
            $subscriber_data->token = '';
            $subscriber_data->status = 'Active';
            $subscriber_data->update();

            return redirect()->back()->with('success_message','you are successfully verified as a subscriber');
        }else {
            return redirect()->route('home');
        }
    }
}
