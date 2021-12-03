<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Navigation;
use Illuminate\Support\Str;
use DB;

class NavigationController extends Controller
{
  public function list()
  {
      $data['details'] = Navigation::orderBy('order', 'asc')->get();
      return view('admin.navigation.list', $data);
  }

  //sorting according to order using ajax.
  public function navigationsortable(Request $request)
  {
      $navigations = DB::table('navigations')->orderBy('order','ASC')->get();
      $itemID=$request->itemID;
      $itemIndex=$request->itemIndex;
      // dd($itemIndex);
      foreach($navigations as $value){
          return DB::table('navigations')->where('id','=',$itemID)->update(array('order'=>$itemIndex));
      }
  }

  //sorting according to order of child menu using ajax.
  public function navigationsortableChild(Request $request)
  {
      $parentId = $request->parentId;
      $navigations = DB::table('navigations')->where('parent', $parentId)->orderBy('order','ASC')->get();
      $itemID=$request->itemID;
      $itemIndex=$request->itemIndex;
      // dd($itemIndex);
      // foreach($navigations as $value){
          return DB::table('navigations')->where('id','=',$itemID)->update(array('order'=>$itemIndex));
      // }
  }

  public function edit($id)
  {
     $data['detail'] = $parentDetail = Navigation::find($id);
     $data['childDetail'] = Navigation::where('parent', $parentDetail->id)->orderBy('order','ASC')->get();

     return view('admin.navigation.edit', $data);
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required',
      'slug' => 'required',
    ]);
     $data = $request->except('publish', 'slug');
     $data['published'] = is_null($request->published) ? 0 : 1;
     $navigationRecord = Navigation::where('id', $id)->first();

     $data['slug'] = $this->generateSlug($request->name, $request->slug, $navigationRecord);
     // dd($data);
     $navigationRecord->update($data);
     return redirect()->back()->with('message', 'Navigation Edited Successfully.');
  }

  public function createStore(Request $request)
  {
     $request->validate([
       'name' => 'required',
     ]);
     $rawData = $request->except(['slug', 'page_name']);

     $rawData['slug'] = $this->generateSlug($request->name, $request->slug, null);

     $rawData['order'] = $this->findOrderForNavigaiton($request->parent);
     Navigation::create($rawData);
     // dd($rawData);
     return redirect()->route($request->page_name . '.index')->with('message', $request->page_name . ' Add In Navigation Table Successfuly.');
  }

  public function findOrderForNavigaiton($id)
  {
     $subNav = Navigation::where('parent', $id)->orderBy('order', 'desc')->first();
     if($subNav == null){
       return 1;
     }
     return ($subNav->order + 1);
  }

  public function deleteNavigation($id)
  {
     $navigation = Navigation::findorfail($id);
     if($navigation->parent == 0)
     {
        $subNav = Navigation::where('parent', $navigation->id)->get();
        foreach($subNav as $sub)
        {
           $sub->delete();
        }
     }
     $navigation->delete();
     return redirect()->back()->with('message', 'Navigation Deleted Successfuly.');
  }

  public function createNew()
  {
     $allParentNavigation = Navigation::where('parent', 0)->get();
     return view('admin.navigation.create', compact('allParentNavigation'));
  }

  public function storeNewNav(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'identifier' => 'required',
      'parent' => 'numeric',
    ]);
    $rawData = $request->except(['identifier', 'slug', 'published']);
    $rawData['identifier'] = $request->identifier . '_' . rand(10, 100);
    $rawData['slug'] = $this->generateSlug($request->name, $request->slug, null);
    $rawData['published'] = is_null($request->published) ? 0 : 1;
    $rawData['order'] = $this->findOrderForNavigaiton($request->parent);

    Navigation::create($rawData);
    return redirect()->back()->with('message', 'Navigation Added Successfuly.');

  }

  public function generateSlug($title, $slug, $oldRecord)
  {
     if(is_null($slug))
        $slugReturn = Str::slug($title);
     else
       $slugReturn = Str::slug($slug);

    $count = Navigation::where('slug', $slugReturn)->count();

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


}
