<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPostController extends Controller
{

    // show post page
    public function show(){
        $posts = Post::with('rSubCategory.rCategory')->get();
        return view('admin.posts',compact('posts'));
    }
    
    // show create post page
    public function create(){
        $subcategories = SubCategory::with('rCategory')->get();
        /*foreach($subcategories as $item){
            echo $item->sub_category_name.' -- '.$item->rCategory->category_name;
            echo "<br>";
        }*/

        return view('admin.posts_create',compact('subcategories'));
    }


    // post store / submit
    public function store(Request $request){
        // create post model object
        $post = new Post();

        // validation
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required',
            'post_photo' => 'required|image|mimes:png,jpg,gif'
        ]);

        // for getting the auto increment number
        $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
        $auto_increment_id = $q[0]->Auto_increment;

        // post photo upload
        $ext = $request->file('post_photo')->extension();
        $final_name = 'post_photo_'.time().'.'.$ext;
        $request->file('post_photo')->move(public_path('uploads/'),$final_name);

        // send data to the database
        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        $post->post_photo = $final_name;
        $post->visitors = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id; // we can get admin id
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;
        // store in the table
        $post->save();

        // tags are separated by comma.
        $tags_array = explode(',',$request->tags);
        //dd($tags_array);
        for ($i=0; $i < count($tags_array); $i++) { 
            $tag = new Tag();
            $tag->post_id = $auto_increment_id;
            $tag->tag_name = $tags_array[$i];
            $tag->save();
        }

        return redirect()->route('admin_post_show')->with('success_message','Post Created Successfully');
    }

    
    // post edit
    public function edit($id){
        $posts = Post::where('id',$id)->first();
        $existing_tags = Tag::where('post_id',$id)->get();
        $subcategories = SubCategory::with('rCategory')->get();
        return view('admin.posts_edit',compact('posts','subcategories','existing_tags'));
    }

    // delete tag
    public function delete_tag($id,$post_id){
        $tag = Tag::where('id',$id)->first();
        $tag->delete();
        return redirect()->route('admin_post_edit',$post_id)->with('success_message','Data is Deleted Successfully');
    }

    // post update
    public function update(Request $request,$id){
        // validation
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required',
        ]);

        $post = Post::where('id',$id)->first();

        // post photo upload
        if ($request->hasFile('post_photo')) {
            $request->validate([
                'post_photo' => 'image|mimes:png,jpg,jpeg,gif'
            ]);
            unlink(public_path('uploads/'.$post->post_photo));
            $ext = $request->file('post_photo')->extension();
            $final_name = 'post_photo_'.time().'.'.$ext;
            $request->file('post_photo')->move(public_path('uploads/'),$final_name);
            $post->post_photo = $final_name;
        }

        // send data to the database
        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        //$post->post_photo = $final_name;
        $post->visitors = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id; // we can get admin id
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;
        // store in the table
        $post->update();

        // tags are separated by comma.
        $tags_array = explode(',',$request->tags);
        //dd($tags_array);
        for ($i=0; $i < count($tags_array); $i++) { 
            $tag = new Tag();
            $tag->post_id = $id;
            $tag->tag_name = $tags_array[$i];
            $tag->save();
        }

        return redirect()->route('admin_post_show')->with('success_message','Post Updated Successfully');
    }

    // post delete
    public function delete($id){
        // $subcategory = SubCategory::where('id',$id)->first();
        // $subcategory->delete();
        // return redirect()->route('admin_sub_category_show')->with('success_message','Data is Deleted Successfully');
    }
    
}
