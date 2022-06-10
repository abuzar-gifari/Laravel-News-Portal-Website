<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use App\Models\SidebarAdvertisement;
use App\Models\TopAdvertisement;
use Illuminate\Http\Request;

class AdminAdvertisementController extends Controller
{
    public function home_ad_show(){
        $home_ad_data = HomeAdvertisement::where('id',1)->first();
        return view('admin.advertisement_home',compact('home_ad_data'));
    }

    public function top_ad_show(){
        $top_ad_data = TopAdvertisement::where('id',1)->first();
        return view('admin.advertisement_top',compact('top_ad_data'));
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
    
    public function top_advertisement_update(Request $request){
        // echo "<pre>";print_r($request->all());die;
        $top_ad_data = TopAdvertisement::where('id',1)->first();

        // image upload portion
        if ($request->hasFile('top_ad')) {
            $request->validate([
                'top_ad' => 'image|mimes:png,jpg,jpeg,gif'
            ]);
            unlink(public_path('uploads/'.$top_ad_data->top_ad));
            $ext = $request->file('top_ad')->extension();
            $final_name = 'top_ad'.'.'.$ext;
            $request->file('top_ad')->move(public_path('uploads/'),$final_name);
            $top_ad_data->above_search_ad = $final_name;
        }

        // normal data
        $top_ad_data->top_ad_url = $request->top_ad_url;
        $top_ad_data->top_ad_status = $request->top_ad_status;
        // update the table
        $top_ad_data->update();
        return redirect()->back()->with('success_message','Data is Updated Successfully');
    }

    public function sidebar_ad_show(){
        $sidebar_ad_data = SidebarAdvertisement::get();
        return view('admin.advertisement_sidebar',compact('sidebar_ad_data'));
    }

    public function sidebar_ad_create(){
        return view('admin.advertisement_sidebar_create');
    }

    public function sidebar_ad_store(Request $request){
        $sidebar_ad_data = new SidebarAdvertisement();
        // validation
        $request->validate([
            //  Call to a member function extension() on null,
            //  error cames because of not using 'required'
            'sidebar_ad' => 'required|image|mimes:png,jpg,jpeg,gif'
        ]);
        // image upload
        $ext = $request->file('sidebar_ad')->extension();
        $final_name = 'sidebar_ad_'.time().'.'.$ext;
        $request->file('sidebar_ad')->move(public_path('uploads/'),$final_name);
        $sidebar_ad_data->sidebar_ad = $final_name;
        // normal data
        $sidebar_ad_data->sidebar_ad_url = $request->sidebar_ad_url;
        $sidebar_ad_data->sidebar_ad_location = $request->sidebar_ad_location;
        // update the table
        $sidebar_ad_data->save();
        return redirect()->route('admin_sidebar_ad_show')->with('success_message','Data is Saved');
    }

    public function sidebar_ad_edit($id){
        $data = SidebarAdvertisement::where('id',$id)->first();
        return view('admin.advertisement_sidebar_edit',compact('data'));
    }

    public function sidebar_ad_update(Request $request,$id){
        $sidebar_data = SidebarAdvertisement::where('id',$id)->first();
        // validation
        $request->validate([
            'sidebar_ad' => 'image|mimes:png,jpg,jpeg,gif'
        ]);
        // image upload portion
        if ($request->hasFile('sidebar_ad')) {
            $request->validate([
                'sidebar_ad' => 'image|mimes:png,jpg,jpeg,gif'
            ]);
            unlink(public_path('uploads/'.$sidebar_data->sidebar_ad));
            $ext = $request->file('sidebar_ad')->extension();
            $final_name = 'sidebar_ad_'.time().'.'.$ext;
            $request->file('sidebar_ad')->move(public_path('uploads/'),$final_name);
            $sidebar_data->sidebar_ad = $final_name;
        }
        // normal data
        $sidebar_data->sidebar_ad_url = $request->sidebar_ad_url;
        $sidebar_data->sidebar_ad_location = $request->sidebar_ad_location;
        // update the table
        $sidebar_data->update();
        return redirect()->route('admin_sidebar_ad_show')->with('success_message','Data is Updated');
    }

    public function sidebar_ad_delete($id){
        $sidebar_data = SidebarAdvertisement::where('id',$id)->first();
        // when data is deleted then must be picture will be unlink
        unlink(public_path('uploads/'.$sidebar_data->sidebar_ad)); 
        // delete that info    
        $sidebar_data->delete();
        return redirect()->route('admin_sidebar_ad_show')->with('success_message','Data is Deleted');   
    }
}
