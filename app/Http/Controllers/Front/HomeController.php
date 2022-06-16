<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use App\Models\Post;
use App\Models\Setting;
use App\Models\SubCategory;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $data = HomeAdvertisement::where('id',1)->first();

        $setting_data = Setting::where('id',1)->first();

        // Each Post Belongs To One SubCategory
        $post_data = Post::with('rSubCategory')->orderBy('id','desc')->get();

        // Each SubCategory Have Multiple Posts
        $sub_category_data = SubCategory::with('rPost')->orderBy('sub_category_order','asc')->where('show_on_home','Show')->get();

        $videos_data = Video::get();

        return view('front.home',compact('data','setting_data','post_data','sub_category_data','videos_data'));
    }
}
