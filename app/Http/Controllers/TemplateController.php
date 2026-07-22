<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\Category;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::with('category')->latest()->paginate(20);
        return view('admin.templates.index', compact('templates'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.templates.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'       => 'required|exists:categories,id',
            'name'              => 'required|string|max:150',
            'slug'              => 'required|string|unique:templates,slug',
            'short_description' => 'required|string|max:300',
            'status'            => 'required|in:active,inactive,draft',
            'meta_title'        => 'nullable|string|max:150',
            'meta_description'  => 'nullable|string|max:300',
        ]);

        Template::create($validated);

        return redirect()->route('admin.templates.index')
                         ->with('success', 'Template created successfully.');
    }

    public function edit(Template $template)
    {
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.templates.edit', compact('template', 'categories'));
    }

    public function update(Request $request, Template $template)
    {
        $validated = $request->validate([
            'category_id'       => 'required|exists:categories,id',
            'name'              => 'required|string|max:150',
            'slug'              => 'required|string|unique:templates,slug,' . $template->id,
            'short_description' => 'required|string|max:300',
            'status'            => 'required|in:active,inactive,draft',
            'meta_title'        => 'nullable|string|max:150',
            'meta_description'  => 'nullable|string|max:300',
        ]);

        $template->update($validated);

        return redirect()->route('admin.templates.index')
                         ->with('success', 'Template updated successfully.');
    }

    public function destroy(Template $template)
    {
        $template->delete();
        return redirect()->route('admin.templates.index')
                         ->with('success', 'Template deleted.');
    }

    public function show(Template $template)
    {
        return redirect()->route('templates.show', $template->slug);
    }
}