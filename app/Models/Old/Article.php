<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
   protected $guarded = ['id', 'created_at', 'updated_at'];

   public function articletype()
   {
     return $this->belongsTo('App\Models\Articletype', 'articletype_id');
   }
}
