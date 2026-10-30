<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryApiController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)
            ->withCount(['templates' => fn ($q) => $q->where('status', 'active')])
            ->orderBy('sort_order')
            ->get();

        return CategoryResource::collection($categories);
    }
}