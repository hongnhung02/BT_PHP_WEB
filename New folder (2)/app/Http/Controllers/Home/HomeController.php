<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $category;
    private $product;

    public function __construct(Category $category, Product $product) {
        $this->category = $category;
        $this->product = $product;
    }

    public function home()
    {
        $categories = $this->category->all();
        $news = $this->product->take(4)->orderBy('id', 'desc')->get();
        return view('home.index', [
            'categories' => $categories,
            'news' => $news
        ]);
    }
}
