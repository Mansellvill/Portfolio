<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Pagination\Paginator;

class MainController extends Controller
{
    public function index() {
        $products = Product::paginate(15);
        $сategory = Category::get();
        return view('index', compact('products', 'сategory'));
    }

    public function search(Request $request) {
        $сategory = Category::get();
        $searchWord = $request->search;
        $searchQuery = Product::query();
        $searchQuery->where('name', 'LIKE', "%{$searchWord}%");
        $products =  $searchQuery->paginate(20);
        return view('search', compact('products', 'сategory', 'searchWord'));
    }


    public function сategory($code) {
        $сategory = Category::where('code_name', $code)->first();
        if($code == 'all') {
            $products = Product::paginate(20);
        }
        else {
            $productsQuery = Product::query();
            $productsQuery->where('category_id', $сategory->id);
            $products = $productsQuery->paginate(20);
        }
        return view('сategories', compact('сategory', 'products'));
    }

    public function product($сategories, $code) {
        $product = Product::where('code_name', $code)->first();
        $сategory = Category::where('code_name', $сategories)->first();
        $randomQuery = Product::query();
        $randomQuery->where('category_id', $сategory->id)->get();
        $randomProducts = $randomQuery->inRandomOrder()->limit(4)->get();
        return view('product', compact('product', 'randomProducts'));
    }

    public function wishlist() {
        return view('wishlist');
    }
}
