<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('childrenRecursive')->paginate(10); // Adjust pagination as needed
        return view('pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parent_categories = Category::get(); // Fetch parent categories
        return view('pages.categories.create', compact('parent_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->description = $request->input('description');
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keyword'); // Already a string
        $category->parent_id = $request->input('parent');
        $category->save();

        return redirect()->route('categories.index')->with('message', 'دسته بندی با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $parent_categories = Category::where('id', '!=', $category->id)->get(); // Exclude itself as a parent
        return view('pages.categories.edit', compact('category', 'parent_categories'));
    }

    public function edit(Category $category)
    {
        $parent_categories = Category::where('id', '!=', $category->id)->get(); // Exclude itself as a parent
        return view('pages.categories.edit', compact('category', 'parent_categories'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->description = $request->input('description');
        $category->meta_title = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->parent_id = $request->input('parent');
        $category->save();

        return redirect()->route('categories.index')->with('message', 'دسته بندی با موفقیت آپدیت شد');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('message', 'دسته بندی با موفقیت حذف شد');
    }
}
