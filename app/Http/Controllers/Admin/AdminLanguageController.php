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

        $test_data = file_get_contents(resource_path('languages/sample.json'));
        file_put_contents(resource_path('languages/'.$request->short_name.'.json'),$test_data);

        return redirect()->route('admin_language_show')->with('success_message','Data Created Successfully');
    }



// language edit and delete

    
    // language edit
    public function edit($id){
        $language_data = Language::where('id',$id)->first();
        return view('admin.language_edit',compact('language_data'));
    }
    
    // language update
    public function update(Request $request,$id){
        $language = Language::where('id',$id)->first();
        // validation
        $request->validate([
            'name' => 'required',
            // 'short_name' => 'required',
        ]);

        if ($request->is_default == "Yes") {
            DB::table('languages')->update([ 'is_default' => 'No' ]);
        }

        // send data to the database
        $language->name = $request->name;
        // $language->short_name = $request->short_name;
        $language->is_default = $request->is_default;
        // update the table
        $language->update();
        return redirect()->route('admin_language_show')->with('success_message','Data Updated Successfully');
    }

    // language delete
    public function delete($id){

        $language = Language::where('id',$id)->first();

        if ($language->is_default == "Yes") {
            DB::table('languages')->where('id',1)->update([ 'is_default' => 'No' ]);
        }

        unlink(resource_path('languages/'.$language->short_name.'.json'));

        $language->delete();

        return redirect()->route('admin_language_show')->with('success_message','Data is Deleted Successfully');
    }


    // admin language update detail
    public function update_detail($id){
        $language_data = Language::where('id',$id)->first();
        $lang_id = $language_data->id;
        $json_data = json_decode( file_get_contents(resource_path('languages/'.$language_data->short_name.'.json')) );
        // dd($json_data);
        return view('admin.language_update_detail',compact('json_data','lang_id'));
    }

    public function update_detail_submit(Request $request,$id){
        //todo

        $language_data = Language::where('id',$id)->first();

        $arr1 = [];
        $arr2 = [];

        foreach($request->arr_key as $val)
        {
            $arr1[] = $val;
        }

        foreach($request->arr_value as $val)
        {
            $arr2[] = $val;
        }

        for ($i=0; $i < count($arr1); $i++) { 
            $data[$arr1[$i]] = $arr2[$i];
        }

        $after_encode = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents(resource_path('languages/'.$language_data->short_name.'.json'),$after_encode);

        return redirect()->route('admin_language_show')->with('success_message','Data is Updated Successfully');

    }


}
