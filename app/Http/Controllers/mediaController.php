<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class mediaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::orderBy('created_at', 'desc')->get();
        return view('media.index')->with('media', $media);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $photo_name = $file->getClientOriginalName();
        $updated_photo_name = time() . '_' . $photo_name;
        $file->move('photos', $updated_photo_name);
        $media = new Media();
        $media->name = $updated_photo_name;
        $media->user_id = auth()->user()->id;
        $media->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $photo = Media::findOrFail($id);
        return view('media.show')->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo = Media::findOrFail($id);
        $photo->delete();
        unlink('./photos/' . $photo->name);
        return redirect('/media')->with('delete', 'Photo deleted');
    }
}
