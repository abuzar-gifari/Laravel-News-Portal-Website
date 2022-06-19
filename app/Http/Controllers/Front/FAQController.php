<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    public function index(){
        $page_data = Page::where('id',1)->first();
        return view('front.faq',compact('page_data'));
    }
}
