<?php

namespace App\helper;

use App\Models\Language;
use Illuminate\Http\Request;


class helper
{
    public static function read_json(){

        // $default_language_data = Language::where('is_default','Yes')->first();
        // $global_short_name = $default_language_data->short_name;

        if (!session()->get('session_short_name'))
        {
            $default_language_data = Language::where('is_default','Yes')->first();
            $current_short_name = $default_language_data->short_name;
        }
        else 
        {
            $current_short_name = session()->get('session_short_name');
        }

        $json_data = json_decode(file_get_contents(resource_path('languages/'.$current_short_name.'.json')));
        foreach ($json_data as $key => $value) 
        {
            define($key,$value);
        }
    }
}
