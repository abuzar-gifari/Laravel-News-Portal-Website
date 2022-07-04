<?php

namespace App\Http\Controllers\Front;

use App\helper\helper;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;


class FAQController extends Controller
{
    public function index(){
        helper::read_json();
        $page_data = Page::where('id',1)->first();
        $faq_data = Faq::get();
        return view('front.faq',compact('page_data','faq_data'));
    }
}
