<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use App\Models\LiveChannel;
use App\Models\OnlinePoll;
use App\Models\Photo;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Subscriber;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index(){

        $total_categories = Category::count();
        
        $total_subcategories = SubCategory::count();
        
        $total_news = Post::count();
        
        $total_photos = Photo::count();
        
        $total_videos = Video::count();
        
        $total_faqs = Faq::count();
        
        $total_polls = OnlinePoll::count();
        
        $total_channels = LiveChannel::count();
        
        $total_subscribers = Subscriber::count();

        return view('admin.home',compact('total_photos','total_categories','total_subcategories','total_news','total_videos','total_faqs','total_polls','total_channels','total_subscribers'));
    }
}
