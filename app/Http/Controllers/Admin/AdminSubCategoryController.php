<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AdminSubCategoryController extends Controller
{

    // show sub-categories page
    public function show(){
        $subcategories_data = SubCategory::with('rCategory','rLanguage')->orderBy('sub_category_order','asc')->get();
        return view('admin.sub_categories',compact('subcategories_data'));
    }
    
    // show create sub-category page
    public function create(){
        // pass the category information to the view file
        $categories = Category::orderBy('category_order','asc')->get();
        return view('admin.sub_categories_create',compact('categories'));
    }


    // sub-category store / submit
    public function store(Request $request){
        // create category model object
        $subcategory = new SubCategory();
        // validation
        $request->validate([
            'sub_category_name' => 'required',
            'show_on_menu' => 'required',
            'sub_category_order' => 'required',
            'category_id' => 'required',
            'language_id'=>'required'
        ],[
            'sub_category_name.required' => 'SubCategory name is required',
            'show_on_menu.required' => 'Want to show it on menu?',
            'sub_category_order.required' => 'SubCategory order is required',
            'category_id.required' => 'Select a category',
            'language_id.required' => 'Select a language',
        ]);
        // send data to the database
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->show_on_menu = $request->show_on_menu;
        $subcategory->show_on_home = $request->show_on_home;
        $subcategory->sub_category_order = $request->sub_category_order;
        $subcategory->category_id = $request->category_id;
        $subcategory->language_id = $request->language_id;
        // store in the table
        $subcategory->save();
        return redirect()->route('admin_sub_category_show')->with('success_message','Sub Category Created Successfully');
    }

    
    // sub-categories edit
    public function edit($id){
        $subcategory = SubCategory::where('id',$id)->first();
        // pass the category information to the view file
        $categories = Category::orderBy('category_order','asc')->get();
        return view('admin.sub_categories_edit',compact('subcategory','categories'));
    }
    
    // sub-categories update
    public function update(Request $request,$id){
        // create category model object
        $subcategory = SubCategory::where('id',$id)->first();
        // validation
        $request->validate([
            'sub_category_name' => 'required',
            'show_on_menu' => 'required',
            'sub_category_order' => 'required',
            'category_id' => 'required',
            'language_id'=>'required'
        ],[
            'sub_category_name.required' => 'SubCategory name is required',
            'show_on_menu.required' => 'Want to show it on menu?',
            'sub_category_order.required' => 'SubCategory order is required',
            'category_id.required' => 'Select a category',
            'language_id.required' => 'Select a language',
        ]);
        // send data to the database
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->show_on_menu = $request->show_on_menu;
        $subcategory->show_on_home = $request->show_on_home;
        $subcategory->sub_category_order = $request->sub_category_order;
        $subcategory->category_id = $request->category_id;
        $subcategory->language_id = $request->language_id;
        // update the table
        $subcategory->update();
        return redirect()->route('admin_sub_category_show')->with('success_message','Sub Category Updated Successfully');
    }

    // sub-categories delete
    public function delete($id){
        $subcategory = SubCategory::where('id',$id)->first();
        $subcategory->delete();
        return redirect()->route('admin_sub_category_show')->with('success_message','Data is Deleted Successfully');
    }
}
