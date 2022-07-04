<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\helper\helper;

class AboutController extends Controller
{
    public function index(){
        helper::read_json();
        $page_data = Page::where('id',1)->first();
        return view('front.about',compact('page_data'));
    }
}
