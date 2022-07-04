<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLanguageController extends Controller
{
    public function show(){
        $language_data = Language::get();
        return view('admin.language_show',compact('language_data'));
    }
    
    
    // show create faq page
    public function create(){
        return view('admin.language_create');
    }


    // faq store / submit
    public function store(Request $request){

        $language_data = new Language();
        // validation
        $request->validate([
            'name' => 'required',
            'short_name' => 'required',
        ]);

        
        if ($request->is_default == "Yes") {
            DB::table('languages')->update([ 'is_default' => 'No' ]);
        }

        // send data to the database
        $language_data->name = $request->name;
        $language_data->short_name = $request->short_name;
        $language_data->is_default = $request->is_default;
        // store in the table
        $language_data->save();

        $test_data = file_get_contents(resource_path('lang/sample.json'));
        file_put_contents(resource_path('lang/'.$request->short_name.'.json'),$test_data);

        return redirect()->route('admin_language_show')->with('success_message','Data Created Successfully');
    }
}
