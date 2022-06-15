<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index(){
        $setting = Setting::where('id',1)->first();
        return view('admin.setting',compact('setting'));
    }

    public function update(Request $request){
        // validation
        $request->validate([
            'news_ticker_total' => 'required'
        ]);
        $setting = Setting::where('id',1)->first();
        $setting->news_ticker_total = $request->news_ticker_total;
        $setting->news_ticker_status = $request->news_ticker_status;
        $setting->video_total = $request->video_total;
        $setting->video_status = $request->video_status;
        $setting->update();

        return redirect()->route('admin_setting')->with('success_message','Data Updated');
    }
}
