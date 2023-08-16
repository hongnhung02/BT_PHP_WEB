<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $product;
    private $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->all();
        return view('admin.product.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->category->all();
        return view('admin.product.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->all([
            'title',
            'price',
            'description',
            'category_id'
        ]);

        $thumbnail = $request->file('thumbnail');
        $thumbnail_path = $thumbnail->store('images', [
            'disk' => 'public'
        ]);

        $params['thumbnail'] = $thumbnail_path;

        $images = $request->file('images');
        if ($images) {
            if (!is_array($images)) {
                $image_paths = [];
                $image_path = $images->store('images', [
                    'disk' => 'public'
                ]);
                array_push($image_paths, $image_path);
                $params['images'] = json_encode($image_paths);
            } else {
                $image_paths = [];
                foreach ($images as $image) {
                    $image_path = $image->store('images', [
                        'disk' => 'public'
                    ]);
                    array_push($image_paths, $image_path);
                }
                $params['images'] = json_encode($image_paths);
            }
        }


        $params['slug'] = Str::slug($params['title']);
        $product = $this->product->create($params);
        if ($product) {
            return redirect()->route('admin.product.index');
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
        $categories = $this->category->all();
        $product = $this->product->find($id);

        return view('admin.product.edit', [
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $params = $request->all([
            'title',
            'price',
            'description',
            'category_id'
        ]);
        $params['slug'] = Str::slug($params['title']);
        $product = $this->product->where('id', $id)->update($params);
        if ($product) {
            return redirect()->route('admin.product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->product->destroy($id);
        if ($product) {
            return redirect()->route('admin.product.index');
        }
    }
}
