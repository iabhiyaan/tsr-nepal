<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allarticle extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category()
    {
      return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function getSlugFromNavigation()
    {
      $nav = \App\Models\Navigation::select(['slug'])->where('identifier', $this->category->identifier)->first();
      if($nav != null){
        return ($nav->slug);
      }else{
        $slugfromcategory = \App\Models\Category::select(['slug'])->where('identifier', $this->category->identifier)->first();
        if($slugfromcategory != null){
          return ($slugfromcategory->slug);
        }else{
          return;
        }
      }
    }
}
