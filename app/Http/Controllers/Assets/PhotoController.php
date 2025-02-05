<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::with('user')->latest()->paginate(5); // Fetch photos sorted by latest
        return view('pages.assets.photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $photo = Photo::with('user')->findOrFail($id);
        return view('pages.assets.photos.show', compact('photo'));
    }

    public function approve($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->status = 'approved';
        $photo->save();

        return redirect()->route('photo.index')->with('success', 'عکس با موفقیت تایید شد.');
    }

    public function reject($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->status = 'rejected';
        $photo->save();

        return redirect()->route('photo.index')->with('error', 'عکس رد شد.');
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
        //
    }
}
