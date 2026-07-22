@extends('layouts.admin')
@section('title', 'Categories — BizMarket Admin')
@section('content')

<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Categories</h1>
        <p class="admin-page-sub">All 11 business template categories</p>
    </div>
</div>

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
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td class="muted">{{ $category->id }}</td>
                <td style="font-size:22px;">{{ $category->icon }}</td>
                <td style="font-weight:500;">{{ $category->name }}</td>
                <td class="muted" style="font-family:monospace;font-size:12px;">{{ $category->slug }}</td>
                <td class="muted">{{ $category->templates_count }}</td>
                <td>
                    <span class="badge {{ $category->is_active ? 'badge-green' : 'badge-gray' }}">
                        {{ $category->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection