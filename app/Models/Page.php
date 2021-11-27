<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // public $newtesting;
    //
    // public function __construct()
    // {
    //   $this->newtesting = env('DEVELOPER_MODE', 'false');
    // }

    public function scopePublished($query)
    {
      return $query->wherePublished(1);
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
      return env('DEVELOPER_MODE', 'false');
    }
}
