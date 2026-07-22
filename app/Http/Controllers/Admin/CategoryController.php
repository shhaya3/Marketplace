<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('templates')
            ->orderBy('sort_order')
            ->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create() { return redirect()->route('admin.categories.index'); }
    public function store() { return redirect()->route('admin.categories.index'); }
    public function show() { return redirect()->route('admin.categories.index'); }
    public function edit() { return redirect()->route('admin.categories.index'); }
    public function update() { return redirect()->route('admin.categories.index'); }
    public function destroy() { return redirect()->route('admin.categories.index'); }
}