@extends('layouts.admin')
@section('title', 'Templates — BizMarket Admin')
@section('content')

<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Templates</h1>
        <p class="admin-page-sub">Manage your website templates</p>
    </div>
    <a href="{{ route('admin.templates.create') }}" class="btn btn-primary">+ Add template</a>
</div>

@if(session('success'))
<div class="alert alert-success">✅ {{ session('success') }}</div>
@endif

<div class="table-wrap">
    <table class="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Status</th>
                <th>Views</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($templates as $template)
            <tr>
                <td class="muted">{{ $template->id }}</td>
                <td>
                    <div>{{ $template->name }}</div>
                    <div class="muted" style="font-size:12px;margin-top:2px;">{{ $template->slug }}</div>
                </td>
                <td class="muted">{{ $template->category->icon }} {{ $template->category->name }}</td>
                <td>
                    <span class="badge {{ $template->status === 'active' ? 'badge-green' : 'badge-gray' }}">
                        {{ ucfirst($template->status) }}
                    </span>
                </td>
                <td class="muted">{{ $template->view_count }}</td>
                <td>
                    <div class="table-actions">
                        <a href="{{ route('templates.show', $template->slug) }}" target="_blank" class="action-link-blue">Preview</a>
                        <a href="{{ route('admin.templates.edit', $template) }}" class="action-link-gold">Edit</a>
                        <form method="POST" action="{{ route('admin.templates.destroy', $template) }}"
                              onsubmit="return confirm('Delete this template?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="action-link-red">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="padding:48px;text-align:center;color:var(--text-muted);">
                    No templates yet. <a href="{{ route('admin.templates.create') }}" class="action-link-gold">Add one →</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top:24px;">{{ $templates->links() }}</div>

@endsection