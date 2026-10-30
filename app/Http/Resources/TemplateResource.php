<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TemplateResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'slug'              => $this->slug,
            'short_description' => $this->short_description,
            'view_count'        => $this->view_count,
            'category'          => [
                'name' => $this->category->name,
                'slug' => $this->category->slug,
                'icon' => $this->category->icon,
            ],
            'url'               => route('templates.show', $this->slug),
            'preview_url'       => route('templates.preview', $this->slug),
            'features'          => $this->whenLoaded('features', fn () => $this->features->pluck('feature')),
            'pages'             => $this->whenLoaded('pages', fn () => $this->pages->pluck('name')),
        ];
    }
}