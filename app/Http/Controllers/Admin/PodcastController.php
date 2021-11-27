<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Podcast;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $details = Podcast::orderBy('updated_at', 'DESC')->get();
       return view('admin.podcast.list', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.podcast.create');
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

       // $podcast['title'] = $request->title;
       $podcast['link'] = $request->link;
       $podcast['published'] = is_null($request->published) ? 0 : 1;
       $podcast['homepage'] = is_null($request->homepage) ? 0 : 1;

       Podcast::create($podcast);
       return redirect()->route('podcast.index')->with('message', 'Podcast Added Successfully.');
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
       $detail = Podcast::findorfail($id);

       return view('admin.podcast.edit', compact('detail'));
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

       $podcast = Podcast::findorfail($id);

       // $podcast['title'] = $request->title;
       $podcast['link'] = $request->link;
       $podcast['published'] = is_null($request->published) ? 0 : 1;
       $podcast['homepage'] = is_null($request->homepage) ? 0 : 1;

       $podcast->save();
       return redirect()->route('podcast.index')->with('message', 'Podcast Updated Successfuly.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $podcast = Podcast::findorfail($id);
       $podcast->delete();
       return redirect()->route('podcast.index')->with('message', 'Podcast Deleted Successfully.');
    }
}
