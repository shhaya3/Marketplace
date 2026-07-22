@extends('layouts.app')

@section('title', 'Browse Templates — BizMarket')
@section('meta_description', '11 business categories. Fully responsive. Ready to customise and launch.')

@section('content')

{{-- Page Header --}}
<div class="templates-page-header">
    <div class="container">
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>›</span>
            <span>Templates</span>
        </nav>
        <h1>Browse all templates</h1>
        <p>11 business categories · Fully responsive · Ready to customise and launch</p>

        <form method="GET" action="{{ route('templates.index') }}" class="search-bar">
            <span class="search-bar-icon" aria-hidden="true">🔍</span>
            <input
                type="search"
                name="search"
                value="{{ request('search') }}"
                class="search-bar-input"
                placeholder="Search by business type, feature, or keyword…"
                aria-label="Search templates"
            />
            <input type="hidden" name="category" value="{{ request('category') }}"/>
            <div class="search-count" aria-live="polite">
                Showing <strong>{{ $templates->total() }}</strong> templates
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Search</button>
        </form>
    </div>
</div>

{{-- Main Layout --}}
<div class="templates-layout">

    {{-- Sidebar --}}
    <aside class="templates-sidebar" aria-label="Filter sidebar">
        <div class="sidebar-section">
            <div class="sidebar-section-title">Category</div>
            <div class="sidebar-filter-list">
                <a href="{{ route('templates.index') }}"
                   class="sidebar-filter-link {{ !request('category') ? 'active' : '' }}">
                    <span class="sidebar-filter-emoji">🏪</span>
                    <span class="sidebar-filter-name">All templates</span>
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('templates.index', ['category' => $cat->slug]) }}"
                   class="sidebar-filter-link {{ request('category') === $cat->slug ? 'active' : '' }}">
                    <span class="sidebar-filter-emoji">{{ $cat->icon }}</span>
                    <span class="sidebar-filter-name">{{ $cat->name }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </aside>

    {{-- Content --}}
    <main class="templates-content">
        <div class="templates-toolbar">
            <p class="templates-result-info">
                <strong>{{ $templates->total() }}</strong> templates found
                @if(request('search'))
                    for "<strong>{{ request('search') }}</strong>"
                @endif
                @if(request('category'))
                    in <strong>{{ request('category') }}</strong>
                @endif
            </p>
            @if(request('search') || request('category'))
            <a href="{{ route('templates.index') }}" class="btn btn-ghost btn-sm">Clear filters ✕</a>
            @endif
        </div>

        @if($templates->count() > 0)
        <div class="templates-grid">
            @foreach($templates as $template)
            <article class="t-card">
                <div class="t-preview" style="background:linear-gradient(140deg,var(--navy),var(--blue));">
                    {{ $template->category->icon }}
                    <div class="t-overlay">
                        <a href="{{ route('templates.preview', $template->slug) }}" class="t-overlay-btn primary">
                            Preview template
                        </a>
                        <a href="{{ route('templates.show', $template->slug) }}" class="t-overlay-btn secondary">
                            View details
                        </a>
                    </div>
                </div>
                <div class="t-body">
                    <span class="badge badge-gold">{{ $template->category->icon }} {{ $template->category->name }}</span>
                    <h2 class="t-name">{{ $template->name }}</h2>
                    <p class="t-desc">{{ $template->short_description }}</p>
                    <div class="t-meta">
                        <span class="t-views">👁 {{ $template->view_count }} views</span>
                        <a href="{{ route('templates.show', $template->slug) }}" class="t-action">Details →</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div style="margin-top:40px;">
            {{ $templates->withQueryString()->links() }}
        </div>

        @else
        <div class="empty-state">
            <div class="empty-state-icon">🔍</div>
            <h3 class="empty-state-title">No templates found</h3>
            <p class="empty-state-desc">Try a different search term or clear the category filter.</p>
            <a href="{{ route('templates.index') }}" class="btn btn-primary">Clear filters</a>
        </div>
        @endif
    </main>
</div>

@endsection