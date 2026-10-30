@extends('layouts.admin')
@section('title', 'Manage content — BizMarket Admin')
@section('content')

<a href="{{ route('admin.templates.index') }}" class="back-link">← Back to templates</a>

<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">{{ $template->name }}</h1>
        <p class="admin-page-sub">Manage the features and pages shown on this template's detail page.</p>
    </div>
</div>

@if(session('success'))
    <div class="cat-flash cat-flash-success">{{ session('success') }}</div>
@endif

<div class="tc-grid">

    {{-- Features --}}
    <section class="tc-card">
        <h2 class="tc-title">Features ({{ $template->features->count() }})</h2>

        <ul class="tc-list">
            @forelse($template->features as $feature)
            <li class="tc-item">
                <span>{{ $feature->feature }}</span>
                <form method="POST" action="{{ route('admin.templates.features.destroy', [$template, $feature]) }}">
                    @csrf @method('DELETE')
                    <button type="submit" class="row-btn row-btn-red">Remove</button>
                </form>
            </li>
            @empty
            <li class="tc-empty">No features yet.</li>
            @endforelse
        </ul>

        <form method="POST" action="{{ route('admin.templates.features.store', $template) }}" class="tc-add">
            @csrf
            <input class="cat-form-input" type="text" name="feature" placeholder="e.g. Online appointment booking" required>
            <button type="submit" class="btn btn-primary btn-sm">Add</button>
        </form>
        @error('feature') <p class="cat-form-error">{{ $message }}</p> @enderror
    </section>

    {{-- Pages --}}
    <section class="tc-card">
        <h2 class="tc-title">Pages ({{ $template->pages->count() }})</h2>

        <ul class="tc-list">
            @forelse($template->pages as $page)
            <li class="tc-item">
                <span>{{ $page->name }}</span>
                <form method="POST" action="{{ route('admin.templates.pages.destroy', [$template, $page]) }}">
                    @csrf @method('DELETE')
                    <button type="submit" class="row-btn row-btn-red">Remove</button>
                </form>
            </li>
            @empty
            <li class="tc-empty">No pages yet.</li>
            @endforelse
        </ul>

        <form method="POST" action="{{ route('admin.templates.pages.store', $template) }}" class="tc-add">
            @csrf
            <input class="cat-form-input" type="text" name="name" placeholder="Page name, e.g. Departments" required>
            <button type="submit" class="btn btn-primary btn-sm">Add</button>
        </form>
        @error('name') <p class="cat-form-error">{{ $message }}</p> @enderror
    </section>

</div>
@endsection