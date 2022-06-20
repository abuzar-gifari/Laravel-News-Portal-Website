<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFAQController extends Controller
{
    
    // show videos page
    public function show(){
        $faq_data = Faq::get();
        return view('admin.faq_show',compact('faq_data'));
    }
    
    // show create faq page
    public function create(){
        return view('admin.faq_create');
    }


    // faq store / submit
    public function store(Request $request){

        $faq = new Faq();
        // validation
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required',
        ]);

        // send data to the database
        $faq->faq_title = $request->faq_title;
        $faq->faq_detail = $request->faq_detail;
        // store in the table
        $faq->save();
        return redirect()->route('admin_faq_show')->with('success_message','Data Created Successfully');
    }

    
    // Faq edit
    public function edit($id){
        $faq_data = Faq::where('id',$id)->first();
        return view('admin.faq_edit',compact('faq_data'));
    }
    
    // Faq update
    public function update(Request $request,$id){
        $faq = Faq::where('id',$id)->first();
        // validation
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required',
        ]);

        // send data to the database
        $faq->faq_title = $request->faq_title;
        $faq->faq_detail = $request->faq_detail;
        // update the table
        $faq->update();
        return redirect()->route('admin_faq_show')->with('success_message','Data Updated Successfully');
    }

    // Faq delete
    public function delete($id){
        $faq_data = Faq::where('id',$id)->first();
        $faq_data->delete();
        return redirect()->route('admin_faq_show')->with('success_message','Data is Deleted Successfully');
    }
}
