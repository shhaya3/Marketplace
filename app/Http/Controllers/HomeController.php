<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $featured = Template::where('status', 'active')
            ->with('category')
            ->orderBy('view_count', 'desc')
            ->take(3)
            ->get();

        return view('home.index', compact('categories', 'featured'));
    }
}