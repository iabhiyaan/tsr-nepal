<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopePublished($query)
    {
      return $query->wherePublished(1);
    }

    public function scopeHomepage($query)
    {
      return $query->whereHomepage(1);
    }

    public function scopeTitleproduct($query)
    {
      return $query->whereTitleproduct(1);
    }

    public function scopeFindbyslug($query, $slug)
    {
      return $query->whereSlug($slug);
    }

    public function category()
    {
      return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
