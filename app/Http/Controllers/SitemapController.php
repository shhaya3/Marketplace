<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Category;

class SitemapController extends Controller
{
    public function index()
    {
        $templates = Template::where('status', 'active')->get();
        $categories = Category::where('is_active', true)->get();

        $content = view('sitemap', compact('templates', 'categories'))->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}