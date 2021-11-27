<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function allarticle()
    {
      return $this->hasMany('App\Models\Allarticle', 'category_id');
    }

    public function isExistsInNavigationTable()
    {
       $result = \App\Models\Navigation::where('identifier', $this->identifier)->first();
       if($result != null){
         return true;
       }else{
         return false;
       }
    }

    public function developerMode()
    {
      $value =  env('DEVELOPER_MODE', false);
      return $value;
    }

    public function scopeGetAllNews($query)
    {
      return $query->where('identifier', 'global_news')->orWhere('identifier', 'nepali_news');
    }

    public function scopeGetAllStockRelated($query)
    {
      return $query->where('identifier', 'nepali_stockes')->orWhere('identifier', 'global_stockes');
    }

    public function scopegetMostOfTheCategorywise($query)
    {
      $exceptCategory = ['global_news', 'nepali_news', 'nepali_stockes', 'global_stockes'];
      $neededCategory = $this->select('identifier')->whereNotIn('identifier', $exceptCategory)->get()->toArray();

      return $query->whereIn('identifier', $neededCategory);
    }
}
