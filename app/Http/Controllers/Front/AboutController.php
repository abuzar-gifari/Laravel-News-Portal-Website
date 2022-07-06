<?php

namespace App\Http\Controllers\Front;

use App\Models\Page;
use App\helper\helper;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index(){

        helper::read_json();

        // fetch the session language
        if (!session()->get('session_short_name')) {
            $current_short_name = Language::where('is_default','Yes')->first()->short_name; 
        }else {
            $current_short_name = session()->get('session_short_name');
        }
        $current_language_id = Language::where('short_name',$current_short_name)->first()->id;
        //dd($current_language_id);
        
        $page_data = Page::where('language_id',$current_language_id)->first();
        return view('front.about',compact('page_data'));
    }
}
