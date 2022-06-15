<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(){
        $photos_data = Photo::paginate(8);
        return view('front.photo_gallery',compact('photos_data'));  
    }
}
