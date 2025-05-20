<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tutorials\StoreRequest;
use App\Models\Tutorial;
use App\Repositories\TutorialRepositoryInterface;
use App\Services\ImageService;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    protected $tutorialRepo;
    protected $image;
    /**
     * Display a listing of the resource.
     */

     public function __construct(TutorialRepositoryInterface $tutorialRepo , ImageService $image)
     {
        $this->tutorialRepo= $tutorialRepo;
        $this->image= $image;
     }

    public function index()
    {
        $tutorials= $this->tutorialRepo->all();
        return view('pages.tutorials.index', compact('tutorials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.tutorials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageId= $this->image->uploadImage($request->file('image'), 'tutorials');
        $data = $request->all();

        $data['image_id']= $imageId->id;
        $data['author_id'] = auth()->id(); // Get authenticated user ID

        $this->tutorialRepo->create($data);
        return redirect()->route('tutorials.store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tutorial $tutorial)
    {
        // Optional: Get related tutorials
        $relatedTutorials = Tutorial::get();
    
        return view('pages.tutorials.show', compact('tutorial', 'relatedTutorials'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tutorial = $this->tutorialRepo->find($id);
        return view('admin.tutorials.edit', compact('tutorial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $this->tutorialRepo->update($id, $data);
        return redirect()->route('admin.tutorials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->tutorialRepo->delete($id);
        return redirect()->route('admin.tutorials.index');
    }
}
