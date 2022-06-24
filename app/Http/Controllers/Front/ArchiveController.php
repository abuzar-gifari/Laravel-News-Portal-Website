<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function show(Request $request){
        //echo $request->archive_month_year;
        $temp = explode('-',$request->archive_month_year);
        $month = $temp[0];
        $year = $temp[1];

        return redirect()->route('archive_detail',[$year,$month]);
    }

    
    public function detail($year,$month){
        $post_data_archive = Post::with('rSubCategory')->whereMonth('created_at','=',$month)->whereYear('created_at','=',$year)->paginate(6);

        foreach($post_data_archive as $item){
            $ts = strtotime($item->updated_at);
            $updated_date = date('F, Y',$ts);
            break;
        }

        // dd($post_data_archive);
        return view('front.archive',compact('post_data_archive','updated_date'));
    }
}
