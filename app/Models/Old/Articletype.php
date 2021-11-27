<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articletype extends Model
{
    protected $guarde = ['id', 'created_at', 'updated_at'];

    public function article()
    {
      return $this->hasMany('\App\Models\Article', 'articletype_id');
    }
}
