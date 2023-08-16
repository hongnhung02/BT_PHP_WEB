<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->category->all();
        return view('admin.category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->category->all();
        return view('admin.category.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $params['slug'] = Str::slug($params['title']);
        $category = $this->category->create($params);
        if ($category) {
            return redirect()->route('admin.category.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->category->find($id);
        $categories = $this->category->all();
        return view('admin.category.edit', [
            'categories' => $categories,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $params = $request->all([
            'title',
            'thumbnail',
            'description',
            'parent_id'
        ]);
        $params['slug'] = Str::slug($params['title']);
        $category = $this->category->where('id', $id)->update($params);
        if ($category) {
            return redirect()->route('admin.category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->category->destroy($id);
        if ($category) {
            return redirect()->route('admin.category.index');
        }
    }
}
