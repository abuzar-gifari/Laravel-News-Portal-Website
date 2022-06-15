<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /* sub-category id enters in this function */
    public function index($id){
        $sub_category_data = SubCategory::where('id',$id)->first();
        /* get all the post data belongs to this sub-category */
        $post_data = Post::where('sub_category_id',$id)->orderBy('id','desc')->paginate(2);
        return view('front.subcategory',compact('sub_category_data','post_data'));
    }
}
