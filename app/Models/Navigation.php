<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    // protected $developerMode;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // public function __construct()
    // {
    //   $this->developerMode = env('DEVELOPER_MODE', 'false');
    // }

    public function developerMode()
    {
      return env('DEVELOPER_MODE', 'true');
    }

    public function children(){
      return $this->hasMany('Navigation', 'parent');
    }

    public function parent(){
      return $this->belongsTo('Navigation', 'parent');
    }


}
