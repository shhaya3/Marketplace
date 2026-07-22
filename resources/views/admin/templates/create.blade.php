@extends('layouts.admin')
@section('title', 'Add Template — BizMarket Admin')
@section('content')

<a href="{{ route('admin.templates.index') }}" class="back-link">← Back to templates</a>
<h1 class="admin-page-title" style="margin-bottom:28px;">Add new template</h1>

@if($errors->any())
<div class="alert alert-error">
    @foreach($errors->all() as $error)
    <div>• {{ $error }}</div>
    @endforeach
</div>
@endif

<form method="POST" action="{{ route('admin.templates.store') }}">
    @csrf
    <div class="form-card">
        <div class="form-group">
            <label class="form-label" for="category_id">Category</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <option value="">Select a category</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->icon }} {{ $cat->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="form-label" for="name">Template name</label>
            <input type="text" id="name" name="name" class="form-input"
                   value="{{ old('name') }}" required placeholder="e.g. CarePoint Hospital"/>
        </div>
        <div class="form-group">
            <label class="form-label" for="slug">Slug</label>
            <input type="text" id="slug" name="slug" class="form-input"
                   value="{{ old('slug') }}" required placeholder="e.g. carepoint-hospital"/>
            <p class="form-hint">URL-friendly name. Lowercase letters and hyphens only.</p>
        </div>
        <div class="form-group">
            <label class="form-label" for="short_description">Short description</label>
            <textarea id="short_description" name="short_description" class="form-textarea"
                      required rows="3"
                      placeholder="Brief description shown on the template card…">{{ old('short_description') }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label" for="status">Status</label>
            <select id="status" name="status" class="form-select">
                <option value="active" {{ old('status','active') === 'active' ? 'selected' : '' }}>Active</option>
                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label" for="meta_title">Meta title</label>
            <input type="text" id="meta_title" name="meta_title" class="form-input"
                   value="{{ old('meta_title') }}" placeholder="SEO page title"/>
        </div>
        <div class="form-group">
            <label class="form-label" for="meta_description">Meta description</label>
            <textarea id="meta_description" name="meta_description" class="form-textarea"
                      rows="2" placeholder="SEO meta description">{{ old('meta_description') }}</textarea>
        </div>
        <div style="display:flex;gap:12px;padding-top:8px;">
            <button type="submit" class="btn btn-navy">Save template</button>
            <a href="{{ route('admin.templates.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </div>
</form>

@endsection