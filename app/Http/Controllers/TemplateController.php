<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Category;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $templates = Template::where('status', 'active')
            ->with('category')
            ->when($request->category, function ($query) use ($request) {
                $query->whereHas('category', fn($q) =>
                    $q->where('slug', $request->category)
                );
            })
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                      ->orWhere('short_description', 'like', '%' . $request->search . '%');
            })
            ->paginate(12);

        return view('templates.index', compact('templates', 'categories'));
    }

    public function show(string $slug)
    {
        $template = Template::where('status', 'active')
            ->where('slug', $slug)
            ->with(['category', 'features', 'pages', 'screenshots'])
            ->firstOrFail();

        $template->increment('view_count');

        return view('templates.show', compact('template'));
    }

    public function byCategory(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $templates = Template::where('status', 'active')
            ->where('category_id', $category->id)
            ->with('category')
            ->paginate(12);

        return view('templates.index', compact('templates', 'categories', 'category'));
    }

    public function preview(string $slug)
    {
        $template = Template::where('status', 'active')
            ->where('slug', $slug)
            ->with('category')
            ->firstOrFail();

        $viewName = 'business-templates.' . $template->category->slug . '.index';

        return view($viewName, compact('template'));
    }
}