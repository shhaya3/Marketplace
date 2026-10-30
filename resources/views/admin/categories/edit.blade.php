@extends('layouts.admin')

@section('title', 'Edit category')

@section('content')
<a href="{{ route('admin.categories.index') }}" class="back-link">← Back to categories</a>
<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Edit category</h1>
        <p class="admin-page-sub">{{ $category->name }}</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.categories.update', $category) }}" class="form-card">
    @csrf
    @method('PUT')
    @include('admin.categories._form')
    <div class="cat-form-actions">
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
@endsection