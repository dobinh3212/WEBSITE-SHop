<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Category;
class Article extends Model
{
    //
    protected $table = 'articles';

    protected $fillable = ['title' , 'slug' , 'image' , 'summary' , 'description' , 'type' , 'position'  , 'status' , 'url' , 'is_active' , 'user_id' , 'meta_title' , 'meta_description'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'type', 'id');
    }
}
