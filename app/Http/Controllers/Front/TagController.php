<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($tag_name){
        
        $all_tag_data = Tag::where('tag_name',$tag_name)->get();
        $tag_array = [];

        foreach($all_tag_data as $tag){
            $tag_array[] = $tag->post_id;
        }

        $all_post = Post::with('rSubCategory')->orderBy('id','desc')->get();
        return view('front.tag',compact('tag_array','all_post','tag_name'));

    }
}
