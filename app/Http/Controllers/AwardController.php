<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAwardRequest;
use App\Http\Requests\UpdateAwardRequest;
use App\Models\Award;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('awards.index', [
            'awards' => Award::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('awards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAwardRequest $request)
    {
        Award::create($request->validated());
        
        Session::flash('success', 'award added successfully');
        return redirect() -> route('awards.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Award $award)
    {
        return view('awards.show', compact('award'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Award $award)
    {
        return view('awards.edit', compact('award'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAwardRequest $request, Award $award)
    {
        $award->update($request->all());
        return redirect()->route('awards.show', $award->id);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function trash($id) {
        Award::destroy($id);
        Session::flash('success', 'Award trashed successfully');
        return redirect()->route('awards.index');
    }
    
    public function destroy($id) {
        $award = Award::withTrashed()->where('id', $id)->first();
        $award->forceDelete();
        Session::flash('success', 'Award deleted successfully');
        return redirect()->route('awards.index');
    }
 
    public function restore($id){
    $award = Award::withTrashed()->where('id', $id)->first();
    $song->restore();
    Session::flash('success', 'Award restored successfully');
    return redirect()->route('awards.trashed');
}
    /**
     * Remove the specified resource from storage.
     */
    
    
   
}
