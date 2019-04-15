<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use \App\Model\Category;

class Article extends Model
{
    protected $fillable =['title','slug','content','category_id','image','thumbnail','short_description'];

    
    public function Category()
    {
        return $this->belongsTo(Category::class , 'category_id', 'id');
        
    }
    public function getRouteKeyName(){
        return 'slug' ;
    }
    
}
