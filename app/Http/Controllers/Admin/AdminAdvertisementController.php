<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use Illuminate\Http\Request;

class AdminAdvertisementController extends Controller
{
    public function home_ad_show(){
        $home_ad_data = HomeAdvertisement::where('id',1)->first();
        return view('admin.advertisement_home',compact('home_ad_data'));
    }
    
    public function home_advertisement_update(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $home_ad_data = HomeAdvertisement::where('id',1)->first();

        // image upload portion
        if ($request->hasFile('above_search_ad')) {
            $request->validate([
                'above_search_ad' => 'image|mimes:png,jpg,jpeg,gif'
            ]);
            unlink(public_path('uploads/'.$home_ad_data->above_search_ad));
            $ext = $request->file('above_search_ad')->extension();
            $final_name = 'above_search_ad'.'.'.$ext;
            $request->file('above_search_ad')->move(public_path('uploads/'),$final_name);
            $home_ad_data->above_search_ad = $final_name;
        }

        if ($request->hasFile('above_footer_ad')) {
            $request->validate([
                'above_footer_ad' => 'image|mimes:png,jpg,jpeg,gif'
            ]);
            unlink(public_path('uploads/'.$home_ad_data->above_search_ad));
            $ext = $request->file('above_footer_ad')->extension();
            $final_name = 'above_footer_ad'.'.'.$ext;
            $request->file('above_footer_ad')->move(public_path('uploads/'),$final_name);
            $home_ad_data->above_search_ad = $final_name;
        }

        // normal data
        $home_ad_data->above_search_ad_url = $request->above_search_ad_url;
        $home_ad_data->above_search_ad_status = $request->above_search_ad_status;
        $home_ad_data->above_footer_ad_url = $request->above_footer_ad_url;
        $home_ad_data->above_footer_ad_status = $request->above_footer_ad_status;
        // update the table
        $home_ad_data->update();
        return redirect()->back()->with('success_message','Data is Updated Successfully');
    }
}
