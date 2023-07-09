<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index()
    {
        $category = Category::all();
        $product = Product::all();

        return view('main.main', compact('category', 'product'));
    }
}
