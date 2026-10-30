<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\TemplateFeature;
use App\Models\TemplatePage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TemplateContentController extends Controller
{
    public function edit(Template $template)
    {
        $template->load(['features', 'pages']);
        return view('admin.templates.content', compact('template'));
    }

    public function storeFeature(Request $request, Template $template)
    {
        $data = $request->validate([
           'feature' => ['required', 'string', 'max:150'],
    ]);

        $data['sort_order'] = ($template->features()->max('sort_order') ?? 0) + 1;

        $template->features()->create($data);

        return back()->with('success', 'Feature added.');
    }

    public function destroyFeature(Template $template, TemplateFeature $feature)
    {
        abort_unless($feature->template_id === $template->id, 404);
        $feature->delete();

        return back()->with('success', 'Feature removed.');
    }

    public function storePage(Request $request, Template $template)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
    ]);

        $data['slug'] = Str::slug($data['name']);
        $data['sort_order'] = ($template->pages()->max('sort_order') ?? 0) + 1;

        $template->pages()->create($data);

        return back()->with('success', 'Page added.');
    }

    public function destroyPage(Template $template, TemplatePage $page)
    {
        abort_unless($page->template_id === $template->id, 404);
        $page->delete();

        return back()->with('success', 'Page removed.');
    }
}