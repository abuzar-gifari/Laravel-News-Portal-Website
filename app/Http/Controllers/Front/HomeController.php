<?php

namespace App\Http\Controllers\Front;

use App\Models\Post;
use App\Models\Video;
use App\helper\helper;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Language;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index(){

        helper::read_json();

        // fetch the session language
        if (!session()->get('session_short_name')) {
            $current_short_name = Language::where('is_default','Yes')->first()->short_name; 
        }else {
            $current_short_name = session()->get('session_short_name');
        }
        $current_language_id = Language::where('short_name',$current_short_name)->first()->id;
        //dd($current_language_id);
        


        $data = HomeAdvertisement::where('id',1)->first();

        $setting_data = Setting::where('id',1)->first();

        // Each Post Belongs To One SubCategory
        $post_data = Post::with('rSubCategory')->where('language_id',$current_language_id)->orderBy('id','desc')->get();

        // Each SubCategory Have Multiple Posts
        $sub_category_data = SubCategory::with('rPost')->where('language_id',$current_language_id)->orderBy('sub_category_order','asc')->where('show_on_home','Show')->get();

        $videos_data = Video::get();

        $category_data = Category::where('language_id',$current_language_id)->orderBy('category_order','asc')->get();

        return view('front.home',compact('data','setting_data','post_data','sub_category_data','videos_data','category_data'));
    }

    public function get_subcategory_by_category($id){
        $sub_category_data = SubCategory::where('category_id',$id)->get();
        $response = "<option value=''>Select SubCategory</option>";
        foreach($sub_category_data as $item){
            $response .= '<option value="'.$item->id.'">'.$item->sub_category_name.'</option>';
        }
        return response()->json(['sub_category_data'=>$response]);
    }

    public function search(Request $request){

        helper::read_json();

        // dd($request->all());
        $post_data = Post::with('rSubCategory')->orderBy('id','desc');
        if ($request->text_item != "") {
            $post_data = $post_data->where('post_title','like','%'.$request->text_item.'%');
        }
        if ($request->sub_category != "") {
            $post_data = $post_data->where('sub_category_id',$request->sub_category);
        }
        $post_data = $post_data->paginate(10);
        return view('front.search_result',compact('post_data'));
    }
}
