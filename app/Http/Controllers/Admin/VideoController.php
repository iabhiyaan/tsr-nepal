<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $details = Video::orderBy('updated_at', 'DESC')->get();
       return view('admin.video.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.video.create');
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
         // 'title' => 'required|max:255',
         'link' => 'required',
       ]);

       // $video['title'] = $request->title;
       $video['link'] = $request->link;
       $video['published'] = is_null($request->published) ? 0 : 1;
       $video['homepage'] = is_null($request->homepage) ? 0 : 1;

       Video::create($video);
       return redirect()->route('video.index')->with('message', 'Video Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $detail = Video::findorfail($id);

       return view('admin.video.edit', compact('detail'));
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
         // 'title' => 'required|max:255',
         'link' => 'required',
       ]);

       $video = Video::findorfail($id);

       // $video['title'] = $request->title;
       $video['link'] = $request->link;
       $video['published'] = is_null($request->published) ? 0 : 1;
       $video['homepage'] = is_null($request->homepage) ? 0 : 1;

       $video->save();
       return redirect()->route('video.index')->with('message', 'Video Updated Successfuly.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $video = Video::findorfail($id);
       $video->delete();
       return redirect()->route('video.index')->with('message', 'Video Deleted Successfully.');
    }
}
