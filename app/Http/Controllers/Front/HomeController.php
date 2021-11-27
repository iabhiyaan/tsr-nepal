<?php

namespace App\Http\Controllers\Front;

// use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Pluralizer;
use Image;
// use App\Models\Article;
// use App\Models\Articletype;
// use App\Models\Analysis;
use App\Models\Commodity;
// use App\Models\Library;
// use App\Models\Market;
use Illuminate\Support\Collection;
use GuzzleHttp\Client;
use App\Models\Category;
use App\Models\Openpress;
use Exception;
use Mail;
use Illuminate\Support\Str;

//allarticlelisting in Traits/Dynamicnav.


use App\Traits\Dynamicnav;


class HomeController extends Controller
{
    use Dynamicnav;

    public function index()
    {

      session('nepseRecord') ?? $nepseData = $this->sendApiRequestForNepseIndex();
      if(@$nepseData != 'error'){
        session('nepseRecord') ?? session(['nepseRecord' => $nepseData]);
      }
      $data['nepseRecord']  = session('nepseRecord');

      $allNewsRelated = Category::with(['allarticle' => function($q){
          $q->where('published', 1)->where('homepage', 1);
      }])->GetAllNews()->get()->pluck('allarticle');

      if($allNewsRelated->count() == 2){
        $data['allLatestNews'] = $allNewsRelated->get(0)->merge($allNewsRelated->get(1))->sortByDesc('updated_at')->take(3);
      }else{
        $data['allLatestNews'] = new Collection();
      }

      $data['latestArticles'] = \App\Models\Allarticle::where('homepage', 1)->where('published', 1)->orderBy('updated_at', 'desc')->take(7)->get();

      $stokesRelates = Category::with(['allarticle' => function($q){
          $q->where('published', 1)->where('homepage', 1);
      }])->getAllStockRelated()->get()->pluck('allarticle');

      if($stokesRelates->count() == 2){
        $data['shareMarketArticle'] = $stokesRelates->get(0)->merge($stokesRelates->get(1))->sortByDesc('updated_at')->take(5);
      }else{
        $data['shareMarketArticle'] = new Collection();
      }

      //all article with category title in news
      $categorywiseArticle = Category::with(['allarticle' => function($q){
        $q->where('published', 1)->where('homepage', 1)->orderBy('updated_at', 'desc');
      }])->getMostOfTheCategorywise()->get()->pluck('allarticle');

      // dd($categorywiseArticle);

      $data['remaningCategoryWiseArticles'] = $this->mergeAllFirstRowOfCollection($categorywiseArticle);

      // dd($data['remaningCategoryWiseArticles']);

      $data['exclusiveArticles'] = \App\Models\Allarticle::where('exclusive', 1)->where('published', 1)->orderBy('updated_at', 'desc')->take(8)->get();

      $data['commodities'] = Commodity::wherePublished('Yes')->orderBy('order', 'asc')->get();

      return view('front.index', $data);


      /* ---------------------------------------- old version begins ------------------------------------------------------------->*/

      // $articleTypeNews = Articletype::with(['article'])->whereSlug('news')->first();
      // dd($data);

      // dd($data);

      // dd($data);
      // $categorywiseArticle->get(0)->merge($stokesRelates->get(1))->sortByDesc('updated_at')->take(5);


      // dd($categorywiseArticle);



      // dd($data);

      // dd($idForNewsGLobalAndLocal);
      // $data['latestNews'] = Category::->get();
      // dd($data);

      // $data['latestNews'] = $articleTypeNews->article()->wherePublished(1)->orderBy('updated_at', 'desc')->take(10)->get();
      // $data['latestHomepageNews'] = $articleTypeNews->article()->wherePublished(1)->whereHomepage(1)->orderBy('updated_at', 'desc')->take(5)->get();
      // $data['exclusiveNewsList'] = $articleTypeNews->article()->wherePublished(1)->whereExclusive(1)->orderBy('updated_at', 'desc')->take(3)->get();
      // $data['articleOfAllCategory'] = Article::select('articletype_id')->groupBy('articletype_id')->get()->toArray();
      // $data['newArticle'] = $articleTypeNews->article()->wherePublished(1)->orderBy('updated_at', 'desc')->first();
      // $data['homepageAnalysis'] = Analysis::wherePublished(1)->whereHomepage(1)->orderBy('updated_at', 'desc')->first();
      // $ipoNews = Articletype::with(['article'])->whereSlug('ipo-news')->first();
      // $interview = Articletype::with(['article'])->whereSlug('interview')->first();
      //
      // $data['latestMarket'] = \App\Models\Market::wherePublished(1)->latest()->first();
      //
      // if(!empty($ipoNews)){
      //   $data['iponewsArticle']  = $ipoNews->article()->wherePublished(1)->orderBy('updated_at', 'desc')->first();
      // }
      // if(!empty($interview)){
      //   $data['interviewArticle']  = $interview->article()->wherePublished(1)->orderBy('updated_at', 'desc')->first();
      // }

      /* ---------------------------------------- old version  End ------------------------------------------------------------->*/

    }

    public function mergeAllFirstRowOfCollection($allCollections)
    {
      // dd($allCollections);
      $allCollectionInsideIt = collect();
      foreach($allCollections as $allCollection)
      {
        if($allCollection->get(0) !== null){
          $allCollectionInsideIt->push($allCollection->get(0));
        if($allCollection->get(1) !== null){
          $allCollectionInsideIt->push($allCollection->get(1));
          }
        }
      }
      return $allCollectionInsideIt->sortByDesc('updated_at')->take(5);
    }

    public function sendApiRequestForNepseIndex()
    {
      try{
       $client = new Client();
       $res = $client->request('GET', 'https://nepse-data-api.herokuapp.com/data/todaysprice');
       // throw new Exception('sad');
       if($res->getStatusCode() == 200){
          $jsonData = $res->getBody();
          $nepseData = json_decode($jsonData, true);
          return $nepseData;
        }else {
          return 'error';
        }
      } catch (Exception $exception){
         return 'error';
      }
    }

    public function getDynamicPages($slug)
    {
       $detail = \App\Models\Page::wherePublished(1)->whereSlug($slug)->first();
       if($detail){
         return view('front.pages.dynamicpage', compact('detail'));
       }else{
         abort('404');
       }
    }

    public function dyanamicNavigation($categoryslug, $slug = null)
    {
       $navigation = \App\Models\Navigation::select(['identifier', 'type', 'slug'])->where('published', 1)->where('slug', $categoryslug)->first();
       if($navigation == null){
         //search in category
         return $this->searchInCategoryTable($categoryslug, $slug);
       }

       if($navigation->identifier == 'podcast' OR $navigation->identifier == 'video'){
          return $this->videoAndPodcast($categoryslug);
       }

       if($navigation->identifier == 'openwriting' OR $navigation->identifier == 'openreading'){
         return $this->{$navigation->identifier}($slug);
       }

       if($this->singlePageCheck($navigation) == 'single_page'){
         return redirect()->route('dynamicPages',[$navigation->slug]);
       }

       if($navigation && $slug == null){
         $result = $this->allarticleListing($navigation);
          if($result['status'] == true){
            $lists = $result['message'];
            return view('front.navdynamic.list', compact('lists'));
            die;
          }
       }else{
         if($navigation){
           $article = $this->getarticleDetails($navigation, $slug);
           if($article['status'] == true){
             $detail = $article['message'];
             $info['pageName'] = $article['categoryName'];
             $latestRelated = $article['latestRelated'];
             return view('front.navdynamic.details', compact('detail', 'info', 'latestRelated'));
             die;
           }
         }
       }

      return view('errors.404');
    }

    public function videoAndPodcast($tablename){
        if($tablename == 'video'){
          $lists = \App\Models\Video::where('published', 1)->paginate(12);
          return view('front.media.video', compact('lists'));
        }
        if($tablename == 'podcast'){
          $lists = \App\Models\Podcast::where('published', 1)->paginate(12);
          return view('front.media.podcast', compact('lists'));
        }
        return;
    }

    public function openwriting($slug)
    {
      return view('front.openpress.form');
    }

    public function openreading($slug)
    {
      if(!is_null($slug)){
        return $this->detailsPageOfOpenpress($slug);
      }
      $lists = Openpress::where('published', 1)->paginate(12);
      return view('front.openpress.list', compact('lists'));
    }

    public function detailsPageOfOpenpress($slug)
    {
       $details = Openpress::where('published', 1)->where('slug', $slug)->first();
       if($details == null){
         return view('errors.404');
       }
       return view('front.openpress.details', compact('details'));
    }

    public function searchInCategoryTable($categoryslug, $slug)
    {
      // dd($slug);
      $category = \App\Models\Category::select(['identifier', 'slug'])->where('published', 1)->where('slug', $categoryslug)->first();

      if($category && $slug == null){
        $result = $this->allarticleListing($category);
         if($result['status'] == true){
           $lists = $result['message'];
           return view('front.navdynamic.list', compact('lists'));
           die;
         }
      }else{
        if($category){
          $article = $this->getarticleDetails($category, $slug);
          if($article['status'] == true){
            $detail = $article['message'];
            $info['pageName'] = $article['categoryName'];
            $latestRelated = $article['latestRelated'];
            return view('front.navdynamic.details', compact('detail', 'info', 'latestRelated'));
            die;
          }
        }
      }
    }

    public function singlePageCheck($navigation)
    {
       if($navigation){
          if($navigation->type == 'single_page'){
            return 'single_page';
          }else{
            return;
          }
       }
       abort('404');
    }

    public function storeOpenpress(Request $request)
    {
      $request->validate([
        'title' => 'required | min: 5 | max: 100',
        'author' => 'min:3 | max:30',
        'description' => 'required | min: 100',
        'main_image' => 'mimes:jpg,jpeg,png,gif|max:3048',
      ]);
      $formData = $request->except(['main_image']);
      $formData['slug'] = $this->generateSlug($request->title, null, null);
      $formData['published'] = 0;
      if($request->hasFile('main_image')){
        list($width, $height) = getimagesize($request->file('main_image')->getRealPath());
         $formData['main_image'] = $this->imageProcessing($request->main_image, $width, $height, 'yes');
      }
      // dd($formData);
      Openpress::create($formData);
      return redirect()->back()->with('message', 'Your Article Submitted Successfully.');
    }

    public function generateSlug($title, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($title);
       else
         $slugReturn = Str::slug($slug);

      $count = Openpress::where('slug', $slugReturn)->count();

        if(!is_null($oldRecord)){
          if($oldRecord->slug == $slugReturn){
            return $slugReturn;
          }else{
            if($count > 0)
              return $slugReturn . '-' . $count;
            else
              return $slugReturn;
          }
        } else {
            if($count > 0)
              return $slugReturn . '-' . $count;
            else
              return $slugReturn;
        }
    }

    public function imageProcessing($image, $width, $height, $otherpath){

      $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . $image->getClientOriginalName();
      $thumbPath = public_path('images/thumbnail');
      $mainPath = public_path('images/main');
      $listingPath= public_path('images/listing');

      $img = Image::make($image->getRealPath());
      $img->resize($width, $height)->save($mainPath.'/'.$input['imagename']);

      if($otherpath == 'yes'){
        $img1 = Image::make($image->getRealPath());
        $img1->resize($width/2, null, function($constraint){
          $constraint->aspectRatio();
        })->save($listingPath.'/'.$input['imagename']);

        $img1->fit(200, null, function($constraint){
          $constraint->aspectRatio();
        })->save($thumbPath.'/'.$input['imagename']);
        $img1->destroy();
      }

        $img->destroy();
        return $input['imagename'];
    }




    /* ------------------------------------------------------old methods start ---------------------------------------------- ------------------*/
      /*
        public function listForAllCategory($table, $category)
        {
           $tableName = Pluralizer::plural($table);

           $categoryName = $this->getTypeOfCategory($category);

           $lists = DB::table($tableName)->orderBy('updated_at', 'desc')->where('type', $categoryName)->paginate(6);
           $info = ['tablename' => $table];
           return view('front.list', compact('lists', 'info'));
        }

        public function getTypeOfCategory($category)
        {
          $name = explode('-', $category);
          $firstLetterCapital = [];
          foreach ($name as $key => $value) {
             $firstLetterCapital[] = ucfirst($value);
          }
          return implode(" ", $firstLetterCapital);
        }

        public function detailsForAll($table, $slug)
        {
          if($table == 'news'){
            $detail1 = $this->getNewsDetails($slug);
            $detail = $this->checkNull($detail1);
            $info = ['pageName' => 'News', 'tablename' => $table];
            $latestRelated = Article::wherePublished(1)->where('id', '!=', $detail->id)->orderBy('updated_at', 'desc')->take(6)->get();
            return view('front.details',compact('detail', 'info', 'latestRelated') );
            die;
          }
          if($table == 'market'){
            $detail1 = $this->getMarketDetails($slug);
            $detail = $this->checkNull($detail1);
            $info = ['pageName' => 'Market', 'tablename' => $table];
            $latestRelated = Market::wherePublished(1)->where('id', '!=', $detail->id)->orderBy('updated_at', 'desc')->take(6)->get();
            return view('front.details',compact('detail', 'info', 'latestRelated') );
            die;
          }
          $tableName = Pluralizer::plural($table);
          $detail = DB::table($tableName)->orderBy('updated_at', 'desc')->where('slug', $slug)->first();
          $info = ['pageName' => $detail->type, 'tablename' => $table];
          $latestRelated = DB::table($tableName)->wherePublished(1)->orderBy('updated_at', 'desc')->where('id', '!=', $detail->id)->take(6)->get();
          return view('front.details', compact('detail', 'info', 'latestRelated'));
        }

        public function listForAll($table)
        {
            $info = ['tablename' => $table];
            if($table == 'news'){
              $lists = $this->getAllNewsList();
              return view('front.list', compact('lists', 'info'));
              die;
            }

            $tableName = Pluralizer::plural($table);
            $lists = DB::table($tableName)->orderBy('updated_at', 'desc')->paginate(6);
            return view('front.list', compact('lists', 'info'));
        }

        public function getAllNewsList()
        {
            $lists = Articletype::with('article')->whereSlug('news')->first()->article()->paginate(6);
            return $lists;
        }

        public function getNewsDetails($slug)
        {
           $detail = Article::wherePublished(1)->where('slug', $slug)->first();
           return $detail;
        }

        public function getMarketDetails($slug)
        {
          $detail = Market::wherePublished(1)->where('slug', $slug)->first();
          return $detail;
        }

        public function forumList()
        {
           $lists = \App\Models\Forum::wherePublished(1)->orderBy('updated_at', 'desc')->paginate(6);
           return view('front.forum.list', compact('lists'));
        }

        public function forumDetails($slug)
        {
            $detail = \App\Models\Forum::wherePublished(1)->whereSlug($slug)->first();
            if(empty($detail)){
              abort('404');
            }
            $latestRelated = \App\Models\Forum::wherePublished(1)->where('id', '!=', $detail->id)->orderBy('updated_at', 'desc')->take(6)->get();
            return view('front.forum.details', compact('detail', 'latestRelated'));
        }

        public function ipofpoList()
        {
           $lists = \App\Models\Ipofpo::wherePublished(1)->orderBy('updated_at', 'desc')->paginate(6);
           return view('front.ipofpo.list', compact('lists'));
        }

        public function ipofpoDetails($slug)
        {
            $detail = \App\Models\Ipofpo::wherePublished(1)->whereSlug($slug)->first();
            if(empty($detail)){
              abort('404');
            }
            $latestRelated = \App\Models\Ipofpo::wherePublished(1)->where('id', '!=', $detail->id)->orderBy('updated_at', 'desc')->take(6)->get();
            return view('front.ipofpo.details', compact('detail', 'latestRelated'));
        }

        public function getVideoList()
        {
          $lists = \App\Models\Video::wherePublished(1)->orderBy('updated_at', 'desc')->paginate(12);
          return view('front.video', compact('lists'));
        }

        public function checkNull($getDataFromCategoryTableValue)
        {
          if(is_null($value))
             abort('404');
          else
            return $value;
        }
      */

      /*---------------------------------------old method ends-------------------------------------------------------------------------*/


}
