<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // news/post id comes
    public function detail($id){

        $post_detail = Post::with('rSubCategory')->where('id',$id)->first();
        // dd($post_detail->sub_category_id);

        // passing the tag data
        $tag_data = Tag::where('post_id',$id)->get();

        if ($post_detail->author_id == 0) 
        {
            /* If Author Doesn't exists */
            $user_data = Admin::where('id',$post_detail->admin_id)->first();
        }
        else 
        {
            /* If Admin Doesn't exists */
        }

        // update page view count
        $total_views = $post_detail->visitors+1;
        $post_detail->visitors = $total_views;
        $post_detail->update();

        // related posts are passing
        $related_post_array = Post::with('rSubCategory')->orderBy('id','desc')->where('sub_category_id',$post_detail->sub_category_id)->get();

        return view('front.post_detail',compact('post_detail','user_data','tag_data','related_post_array'));
    }
}
