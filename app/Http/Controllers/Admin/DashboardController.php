<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use Image;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = Dashboard::first();
        return view('admin.dashboard', compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort('404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      $this->validate($request, $this->rules());
      $formInput = $request->except(['logo', 'contactus_image', 'slogan_image', 'homepagemain_image']);
      $record = Dashboard::find($id);

      if($request->hasFile('logo')){
        if($record->logo)
          $this->unlinkImage($record->logo);
        list($width, $height) = getimagesize($request->file('logo')->getRealPath());
        $formInput['logo'] = $this->imageProcessing($request->file('logo'),$width,$height, 'no');
      }

      if($request->hasFile('homepagemain_image')){
        if($record->homepagemain_image)
            $this->unlinkImage($record->homepagemain_image);
        $formInput['homepagemain_image'] = $this->imageProcessing($request->homepagemain_image, 459, 382, 'no');
      }

      if($request->hasFile('testimonial_banner_image')){
        if($record->testimonial_banner_image)
            $this->unlinkImage($record->testimonial_banner_image);
        $formInput['testimonial_banner_image'] = $this->imageProcessing($request->testimonial_banner_image, 1349, 300, 'no');
      }

      if($request->hasFile('slogan_image')){
        if($record->slogan_image)
            $this->unlinkImage($record->slogan_image);
        $formInput['slogan_image'] = $this->imageProcessing($request->slogan_image, 1351, 315, 'no');
      }

      $record->update($formInput);
      return redirect()->back()->with('message', 'Dashboard Edited Successfuly.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function rules()
    {
        $rules = [
          'site_name' => 'required',
          'logo' => 'mimes:jpg,jpeg,png,gif|max:3048',
          'contactus_image' => 'mimes:jpg,jpeg,png,gif|max:3048',
          'featured_trips_image' => 'mimes:jpg,jpeg,png,gif|max:3048',
          'slogan_image' => 'mimes:jpg,jpeg,png,gif|max:3048',
        ];
        return $rules;
    }

    public function imageProcessing($image, $width, $height, $otherpath){

      $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . $image->getClientOriginalName();
      $thumbPath = public_path('images/thumbnail');
      $mainPath = public_path('images/main');
      $listingPath= public_path('images/listing');

      // if(is_null($height))
      // {
      //   $img = Image::make($image->getRealPath());
      //   $img->resize($width, null, function($constraint){
      //     $constraint->aspectRatio();
      //   })->save($mainPath.'/'.$input['imagename']);
      // } else {
        $img = Image::make($image->getRealPath());
        $img->resize($width, $height)->save($mainPath.'/'.$input['imagename']);
      // }

      if($otherpath == 'yes'){
        $img->resize($width/2, null, function($constraint){
          $constraint->aspectRatio();
        })->save($listingPath.'/'.$input['imagename']);

        $img->fit(200, null, function($constraint){
          $constraint->aspectRatio();
        })->save($thumbPath.'/'.$input['imagename']);
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
