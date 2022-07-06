<?php

namespace App\Http\Controllers\Front;

use App\helper\helper;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Language;

class FAQController extends Controller
{
    public function index(){

        helper::read_json();

        if (!session('session_short_name')) {
            $current_short_name = Language::where('is_default','Yes')->first()->short_name;
        }else {
            $current_short_name = session('session_short_name');
        }
        $current_language_id = Language::where('short_name',$current_short_name)->first()->id;


        $page_data = Page::where('id',1)->first();
        $faq_data = Faq::where('language_id',$current_language_id)->get();
        return view('front.faq',compact('page_data','faq_data'));
    }
}
