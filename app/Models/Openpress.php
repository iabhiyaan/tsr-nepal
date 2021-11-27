<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Openpress extends Model
{
    protected $fillable = ['title', 'author', 'description', 'main_image', 'published', 'slug', 'short_description', 'banner_image'];

    public function getSlugFromNavigation()
    {
      $nav = \App\Models\Navigation::select(['slug'])->where('identifier', 'openreading')->first();
      if($nav != null){
        return ($nav->slug);
      }
      return;
      // else{
      //   $slugfromcategory = \App\Models\Category::select(['slug'])->where('identifier', $this->category->identifier)->first();
      //   if($slugfromcategory != null){
      //     return ($slugfromcategory->slug);
      //   }else{
      //     return;
      //   }
      // }
    }
}
