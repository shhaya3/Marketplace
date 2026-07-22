@extends('layouts.admin')
@section('title', 'Enquiries — BizMarket Admin')
@section('content')

<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Enquiries</h1>
        <p class="admin-page-sub">{{ $enquiries->total() }} total enquiries</p>
    </div>
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
                <th>Email</th>
                <th>Business</th>
                <th>Category</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($enquiries as $enquiry)
            <tr class="{{ $enquiry->status === 'unread' ? 'row-unread' : '' }}">
                <td class="muted">{{ $enquiry->id }}</td>
                <td style="font-weight:500;">{{ $enquiry->full_name }}</td>
                <td class="muted">{{ $enquiry->email }}</td>
                <td class="muted">{{ $enquiry->business_name ?? '—' }}</td>
                <td class="muted">{{ $enquiry->business_category ?? '—' }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.enquiries.update', $enquiry) }}">
                        @csrf @method('PATCH')
                        <select name="status" class="status-select" onchange="this.form.submit()">
                            <option value="unread"   {{ $enquiry->status === 'unread'   ? 'selected' : '' }}>Unread</option>
                            <option value="read"     {{ $enquiry->status === 'read'     ? 'selected' : '' }}>Read</option>
                            <option value="resolved" {{ $enquiry->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                        </select>
                    </form>
                </td>
                <td class="muted">{{ $enquiry->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="action-link-gold">View →</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="padding:48px;text-align:center;color:var(--text-muted);">
                    No enquiries yet.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div style="margin-top:24px;">{{ $enquiries->links() }}</div>

@endsection