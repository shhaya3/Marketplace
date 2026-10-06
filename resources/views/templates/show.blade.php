@extends('layouts.app')

@section('title', $template->name . ' Website Template — BizMarket')
@section('meta_description', $template->short_description)
@section('og_title', $template->name . ' — ' . $template->category->name . ' Website Template')
@section('og_description', $template->short_description)

@section('content')

@push('structured_data')
@php
$schema = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Templates', 'item' => route('templates.index')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $template->name, 'item' => route('templates.show', $template->slug)],
            ],
        ],
        [
            '@type' => 'CreativeWork',
            'name' => $template->name,
            'description' => $template->short_description,
            'genre' => $template->category->name,
            'url' => route('templates.show', $template->slug),
            'publisher' => ['@type' => 'Organization', 'name' => 'BizMarket'],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush


{{-- Hero --}}
<div class="page-header">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>›</span>
            <a href="{{ route('templates.index') }}">Templates</a>
            <span>›</span>
            <span>{{ $template->name }}</span>
        </nav>
        <div class="template-detail-hero">
            <div class="template-detail-info">
                <span class="badge badge-gold mb-sm">{{ $template->category->icon }} {{ $template->category->name }}</span>
                <h1 class="page-title">{{ $template->name }}</h1>
                <p class="template-detail-desc">{{ $template->short_description }}</p>
                <div class="template-detail-actions">
                    <a href="{{ route('templates.preview', $template->slug) }}" class="btn btn-primary btn-lg">
                        Preview template →
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline btn-lg">
                        Get this template
                    </a>
                </div>
            </div>
            <div class="template-detail-visual">
                {{ $template->category->icon }}
            </div>
        </div>
    </div>
</div>

{{-- Features & Pages --}}
<section class="section bg-ivory">
    <div class="container">
        <div class="template-detail-grid">
            <div>
                <h2 class="section-title">Features included</h2>
                @if($template->features->count() > 0)
                    @foreach($template->features as $feature)
                    <div class="feature-item">
                        <span class="feature-check">✓</span>
                        <span>{{ $feature->feature }}</span>
                    </div>
                    @endforeach
                @else
                    <p class="text-muted">Feature list coming soon.</p>
                @endif
            </div>
            <div>
                <h2 class="section-title">Pages included</h2>
                @if($template->pages->count() > 0)
                    @foreach($template->pages as $page)
                    <div class="feature-item">
                        <span>📄</span>
                        <span>{{ $page->name }}</span>
                    </div>
                    @endforeach
                @else
                    <p class="text-muted">Page list coming soon.</p>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- Enquiry CTA --}}
<section class="cta-band">
    <div class="container text-center">
        <h2 class="cta-title">Interested in this template?</h2>
        <p class="cta-subtitle">Send us an enquiry and we'll get back to you within one working day.</p>
        <a href="{{ route('contact') }}?template={{ $template->id }}" class="btn btn-primary btn-lg">
            Send enquiry →
        </a>
    </div>
</section>

@endsection