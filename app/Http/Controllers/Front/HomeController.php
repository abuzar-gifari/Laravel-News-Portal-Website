<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
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

        $category_data = Category::orderBy('category_order','asc')->get();

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
