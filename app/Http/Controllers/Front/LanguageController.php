<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch_language(Request $request){
        // dd($request->short_name);
        session()->put('session_short_name',$request->short_name);
        return redirect()->back();
    }
}
