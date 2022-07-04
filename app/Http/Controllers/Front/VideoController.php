<?php

namespace App\Http\Controllers\Front;

use App\helper\helper;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(){
        helper::read_json();
        $videos_data = Video::paginate(8);
        return view('front.video_gallery',compact('videos_data')); 
    }
}
