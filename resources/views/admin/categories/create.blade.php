@extends('layouts.admin')

@section('title', 'New category')

@section('content')
<a href="{{ route('admin.categories.index') }}" class="back-link">← Back to categories</a>
<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">New category</h1>
        <p class="admin-page-sub">Add a business category for templates.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.categories.store') }}" class="form-card">
    @csrf
    @include('admin.categories._form')
    <div class="cat-form-actions">
        <button type="submit" class="btn btn-primary">Create category</button>
    </div>
</form>
@endsection