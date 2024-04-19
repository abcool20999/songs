<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Song;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('songs.index', [
            'songs' => Song::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSongRequest $request)
    {
        Song::create($request->validated());
        
        Session::flash('success', 'song added successfully');
        return redirect() -> route('songs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSongRequest $request, Song $song)
    {
        $song->update($request->all());
        return redirect()->route('songs.show', $song->id);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function trash($id) {
        Song::destroy($id);
        Session::flash('success', 'Song trashed successfully');
        return redirect()->route('songs.index');
    }
    
    public function destroy($id) {
        $song = Song::withTrashed()->where('id', $id)->first();
        $song->forceDelete();
        Session::flash('success', 'Song deleted successfully');
        return redirect()->route('songs.index');
    }
 
    public function restore($id){
    $song = Song::withTrashed()->where('id', $id)->first();
    $song->restore();
    Session::flash('success', 'Song restored successfully');
    return redirect()->route('songs.trashed');
}
    /**
     * Remove the specified resource from storage.
     */
    
    
   
}
