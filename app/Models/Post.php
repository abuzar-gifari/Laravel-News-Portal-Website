<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // posts are belongs to subcategory
    public function rSubCategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

    public function rLanguage(){
        return $this->belongsTo(Language::class,'language_id');
    }
}
