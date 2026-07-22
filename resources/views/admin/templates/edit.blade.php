@extends('layouts.admin')
@section('title', 'Edit Template — BizMarket Admin')
@section('content')

<a href="{{ route('admin.templates.index') }}" class="back-link">← Back to templates</a>
<h1 class="admin-page-title" style="margin-bottom:28px;">Edit: {{ $template->name }}</h1>

@if($errors->any())
<div class="alert alert-error">
    @foreach($errors->all() as $error)
    <div>• {{ $error }}</div>
    @endforeach
</div>
@endif

<form method="POST" action="{{ route('admin.templates.update', $template) }}">
    @csrf @method('PUT')
    <div class="form-card">
        <div class="form-group">
            <label class="form-label" for="category_id">Category</label>
            <select id="category_id" name="category_id" class="form-select" required>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $template->category_id == $cat->id ? 'selected' : '' }}>
                    {{ $cat->icon }} {{ $cat->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="form-label" for="name">Template name</label>
            <input type="text" id="name" name="name" class="form-input"
                   value="{{ old('name', $template->name) }}" required/>
        </div>
        <div class="form-group">
            <label class="form-label" for="slug">Slug</label>
            <input type="text" id="slug" name="slug" class="form-input"
                   value="{{ old('slug', $template->slug) }}" required/>
            <p class="form-hint">Changing the slug will break any existing preview links.</p>
        </div>
        <div class="form-group">
            <label class="form-label" for="short_description">Short description</label>
            <textarea id="short_description" name="short_description" class="form-textarea"
                      required rows="3">{{ old('short_description', $template->short_description) }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label" for="status">Status</label>
            <select id="status" name="status" class="form-select">
                <option value="active" {{ $template->status === 'active' ? 'selected' : '' }}>Active</option>
                <option value="draft" {{ $template->status === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="inactive" {{ $template->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label" for="meta_title">Meta title</label>
            <input type="text" id="meta_title" name="meta_title" class="form-input"
                   value="{{ old('meta_title', $template->meta_title) }}"/>
        </div>
        <div class="form-group">
            <label class="form-label" for="meta_description">Meta description</label>
            <textarea id="meta_description" name="meta_description" class="form-textarea"
                      rows="2">{{ old('meta_description', $template->meta_description) }}</textarea>
        </div>
        <div style="display:flex;gap:12px;padding-top:8px;">
            <button type="submit" class="btn btn-navy">Update template</button>
            <a href="{{ route('admin.templates.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </div>
</form>

@endsection