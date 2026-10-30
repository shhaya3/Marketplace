@extends('layouts.admin')
@section('title', 'Categories — BizMarket Admin')
@section('content')

<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Categories</h1>
        <p class="admin-page-sub">All {{ $categories->count() }} business template categories</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">+ Add category</a>
</div>

@if(session('success'))
    <div class="cat-flash cat-flash-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="cat-flash cat-flash-error">{{ session('error') }}</div>
@endif

<div class="table-wrap">
    <table class="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Icon</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Templates</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td class="muted">{{ $category->id }}</td>
                <td class="cat-icon-cell">{{ $category->icon }}</td>
                <td class="cat-name-cell">{{ $category->name }}</td>
                <td class="muted cat-slug-cell">{{ $category->slug }}</td>
                <td class="muted">{{ $category->templates_count }}</td>
                <td>
                    <span class="badge {{ $category->is_active ? 'badge-green' : 'badge-gray' }}">
                        {{ $category->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td>
                    <div class="row-actions">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="row-btn row-btn-gold">Edit</a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}"
                              onsubmit="return confirm('Delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="row-btn row-btn-red">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection