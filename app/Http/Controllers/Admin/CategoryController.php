<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Image;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $details = Category::orderBy('updated_at', 'desc')->get();
        return view('admin.category.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required',
        ]);
        // dd($request->all());
        $formInput = $request->except(['published', 'slug']);
        $formInput['slug'] = $this->generateSlug($request->name, $request->slug, null);
        $formInput['published'] = is_null($request->published) ? 'No' : 'Yes';

        $formInput['identifier'] = str_replace("-", "_", $formInput['slug']) . '_' . rand(10, 100);

        // $formInput['homepage'] = is_null($request->homepage) ? 0 : 1;
        // $formInput['exclusive'] = is_null($request->exclusive) ? 0 : 1;
        // if($request->hasFile('banner_image')){
        //   $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1349, 356, 'no');
        // }
        // if($request->hasFile('main_image')){
        //   list($width, $height) = getimagesize($request->file('main_image')->getRealPath());
        //    $formInput['main_image'] = $this->imageProcessing($request->main_image, $width, $height, 'yes');
        // }
        
        Category::create($formInput);
        return redirect()->route('category.index')->with('message', 'Category Create Successfuly.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['category'] = Category::findorfail($id);
        $data['navigation'] = \App\Models\Navigation::where('parent', 0)->get();

        return view('admin.category.addnav', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Category::findorfail($id);
        return view('admin.category.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required',
        // 'short_description' => 'required',
        // 'banner_image' => 'mimes:jpg,png,jpeg,gif|max:3048',
        // 'main_image' => 'mimes:jpg,jpeg,png,gif|max:3048',
      ]);
      $oldRecord = Category::findorfail($id);

      $formInput = $request->except(['published', 'slug']);
      $formInput['slug'] = $this->generateSlug($request->name, $request->slug, $oldRecord);
      $formInput['published'] = is_null($request->published) ? 'No' : 'Yes';
      // $formInput['homepage'] = is_null($request->homepage) ? 0 : 1;
      // $formInput['exclusive'] = is_null($request->exclusive) ? 0 : 1;
      // if($request->hasFile('banner_image')){
      //   if($oldRecord->banner_image){
      //     $this->unlinkImage($oldRecord->banner_image);
      //   }
      //   $formInput['banner_image'] = $this->imageProcessing($request->banner_image, 1349, 356, 'yes');
      // }
      // if($request->hasFile('main_image')){
      //   if($oldRecord->main_image){
      //     $this->unlinkImage($oldRecord->main_image);
      //   }
      //   list($width, $height) = getimagesize($request->file('main_image')->getRealPath());
      //   $formInput['main_image'] = $this->imageProcessing($request->main_image, $width, $height, 'yes');
      // }
      $oldRecord->update($formInput);
      return redirect()->route('category.index')->with('message', 'Category Edited Successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Category::findorfail($id);
        if($record->banner_image){
          $this->unlinkImage($record->banner_image);
        }
        if($record->main_image){
          $this->unlinkImage($record->main_image);
        }
        $record->delete();
        return redirect()->route('category.index')->with('message', 'Category Deleted Successfuly.');
    }

    public function generateSlug($name, $slug, $oldRecord)
    {
       if(is_null($slug))
          $slugReturn = Str::slug($name);
       else
         $slugReturn = Str::slug($slug);

      $count = Category::where('slug', $slugReturn)->count();

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

    public function unlinkImage($imagename)
    {
      $thumbPath = public_path('images/thumbnail/') . $imagename;
      $mainPath = public_path('images/main/') . $imagename;
      $listingPath= public_path('images/listing/') . $imagename;
       if(file_exists($thumbPath))
          unlink($thumbPath);
       if(file_exists($mainPath))
          unlink($mainPath);
       if(file_exists($listingPath))
          unlink($listingPath);
      return;
    }
}
