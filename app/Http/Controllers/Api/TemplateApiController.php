<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TemplateResource;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateApiController extends Controller
{
    public function index(Request $request)
    {
        $perPage = min(max((int) $request->query('per_page', 12), 1), 50);

        $templates = Template::query()
            ->where('status', 'active')
            ->with('category')
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->whereHas('category', fn ($q) => $q->where('slug', $request->query('category')));
            })
            ->when($request->filled('search'), function ($query) use ($request) {
                $term = $request->query('search');
                $query->where(function ($q) use ($term) {
                    $q->where('name', 'like', '%' . $term . '%')
                      ->orWhere('short_description', 'like', '%' . $term . '%');
                });
            })
            ->orderBy('id')
            ->paginate($perPage)
            ->withQueryString();

        return TemplateResource::collection($templates);
    }

    public function show(string $slug)
    {
        $template = Template::where('status', 'active')
            ->where('slug', $slug)
            ->with(['category', 'features', 'pages'])
            ->firstOrFail();

        return new TemplateResource($template);
    }
}