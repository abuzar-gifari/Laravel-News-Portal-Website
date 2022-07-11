<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    // show categories page
    public function show(){
        $categories_data = Category::with('rLanguage')->orderBy('category_order','asc')->get();
        return view('admin.categories',compact('categories_data'));
    }

    // show create category page
    public function create(){
        return view('admin.categories_create');
    }

    // category store / submit
    public function store(Request $request){
        // create category model object
        $category = new Category();
        // validation
        $request->validate([
            'category_name' => 'required|unique:categories',
            'show_on_menu' => 'required',
            'category_order' => 'required',
        ],[
            'category_name.required' => 'category name is required',
            'show_on_menu.required' => 'want to show on menu?',
            'category_order.required' => 'category order is required',
        ]);
        // send data to the database
        $category->category_name = $request->category_name;
        $category->show_on_menu = $request->show_on_menu;
        $category->category_order = $request->category_order;
        $category->language_id = $request->language_id;
        // store in the table
        $category->save();
        return redirect()->route('admin_category_show')->with('success_message','Category Created Successfully');
    }
}
