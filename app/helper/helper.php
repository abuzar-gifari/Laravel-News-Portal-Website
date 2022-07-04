<?php

namespace App\helper;

use App\Models\Language;
use Illuminate\Http\Request;


class helper
{
    public static function read_json(){
        if (!session()->get('session_short_name'))
        {
            $current_short_name = $global_short_name;
        }
        else 
        {
            $current_short_name = session()->get('session_short_name');
        }
        $json_data = json_decode(file_get_contents(resource_path('lang/'.$current_short_name.'.json')));
        foreach ($json_data as $key => $value) {
            define($key,$value);
        }
    }
}
