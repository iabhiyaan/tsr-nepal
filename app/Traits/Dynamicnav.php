<?php
namespace App\Traits;
use App\Models\Category;
use App\Models\Allarticle;


trait Dynamicnav {

  public function allarticleListing($navigation)
  {
      $response = [];
      $record = Category::with(['allarticle'])->where('published', 'Yes')->where('identifier', $navigation->identifier)->first();
      if($record){
        $allArticles = $record->allarticle()->where('published', 1)->orderBy('updated_at', 'desc')->paginate(12);
        $response['status'] = true;
        $response['message'] = $allArticles;
        return $response;
      }else{
        $response['status'] = false;
        $response['message'] = 'nothing found at category table';
        return $response;
      }
  }

  public function getarticleDetails($navigation, $slug)
  {
    $response = [];
    $category = Category::with(['allarticle'])->where('published', 'Yes')->where('identifier', $navigation->identifier)->first();
    if($category){
        $a = $category->allArticle()->where('published', 1)->whereSlug($slug)->first();
        if($a != null){
          $response['status'] = true;
          $response['message'] = $a;
          $response['categoryName'] = $category->name;
          $response['latestRelated'] = $category->allArticle()->where('published', 1)->where('id', '!=', $a->id)->take(6)->get();
          return $response;
        }
    }
    $response['status'] = false;
    $response['message'] = 'category not found';
    return $response;
  }

}




 ?>
