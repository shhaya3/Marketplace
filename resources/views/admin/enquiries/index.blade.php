@extends('layouts.admin')
@section('title', 'Enquiries — BizMarket Admin')
@section('content')

<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Enquiries</h1>
        <p class="admin-page-sub">{{ $unread->count() + $read->count() + $resolved->count() }} total enquiries</p>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success">✅ {{ session('success') }}</div>
@endif

{{-- Unread Section --}}
<div class="enquiry-group">
    <div class="enquiry-group-header">
        <span class="enquiry-group-dot dot-unread"></span>
        <h2 class="enquiry-group-title">Unread</h2>
        <span class="enquiry-group-count count-unread">{{ $unread->count() }}</span>
    </div>
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
                @forelse($unread as $enquiry)
                <tr class="row-unread">
                    <td class="muted">{{ $enquiry->id }}</td>
                    <td style="font-weight:500;">{{ $enquiry->full_name }}</td>
                    <td class="muted">{{ $enquiry->email }}</td>
                    <td class="muted">{{ $enquiry->business_name ?? '—' }}</td>
                    <td class="muted">{{ $enquiry->business_category ?? '—' }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.enquiries.update', $enquiry) }}">
                            @csrf @method('PATCH')
                            <select name="status" class="status-select" onchange="this.form.submit()">
                                <option value="unread" selected>Unread</option>
                                <option value="read">Read</option>
                                <option value="resolved">Resolved</option>
                            </select>
                        </form>
                    </td>
                    <td class="muted">{{ $enquiry->created_at->format('d M Y') }}</td>
                    <td><a href="{{ route('admin.enquiries.show', $enquiry) }}" class="action-link-gold">View →</a></td>
                </tr>
                @empty
                <tr><td colspan="8" class="enquiry-empty">No unread enquiries.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Read Section --}}
<div class="enquiry-group">
    <div class="enquiry-group-header">
        <span class="enquiry-group-dot dot-read"></span>
        <h2 class="enquiry-group-title">Read</h2>
        <span class="enquiry-group-count count-read">{{ $read->count() }}</span>
    </div>
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
                @forelse($read as $enquiry)
                <tr>
                    <td class="muted">{{ $enquiry->id }}</td>
                    <td style="font-weight:500;">{{ $enquiry->full_name }}</td>
                    <td class="muted">{{ $enquiry->email }}</td>
                    <td class="muted">{{ $enquiry->business_name ?? '—' }}</td>
                    <td class="muted">{{ $enquiry->business_category ?? '—' }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.enquiries.update', $enquiry) }}">
                            @csrf @method('PATCH')
                            <select name="status" class="status-select" onchange="this.form.submit()">
                                <option value="unread">Unread</option>
                                <option value="read" selected>Read</option>
                                <option value="resolved">Resolved</option>
                            </select>
                        </form>
                    </td>
                    <td class="muted">{{ $enquiry->created_at->format('d M Y') }}</td>
                    <td><a href="{{ route('admin.enquiries.show', $enquiry) }}" class="action-link-gold">View →</a></td>
                </tr>
                @empty
                <tr><td colspan="8" class="enquiry-empty">No read enquiries.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Resolved Section --}}
<div class="enquiry-group">
    <div class="enquiry-group-header">
        <span class="enquiry-group-dot dot-resolved"></span>
        <h2 class="enquiry-group-title">Resolved</h2>
        <span class="enquiry-group-count count-resolved">{{ $resolved->count() }}</span>
    </div>
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
                @forelse($resolved as $enquiry)
                <tr>
                    <td class="muted">{{ $enquiry->id }}</td>
                    <td style="font-weight:500;">{{ $enquiry->full_name }}</td>
                    <td class="muted">{{ $enquiry->email }}</td>
                    <td class="muted">{{ $enquiry->business_name ?? '—' }}</td>
                    <td class="muted">{{ $enquiry->business_category ?? '—' }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.enquiries.update', $enquiry) }}">
                            @csrf @method('PATCH')
                            <select name="status" class="status-select" onchange="this.form.submit()">
                                <option value="unread">Unread</option>
                                <option value="read">Read</option>
                                <option value="resolved" selected>Resolved</option>
                            </select>
                        </form>
                    </td>
                    <td class="muted">{{ $enquiry->created_at->format('d M Y') }}</td>
                    <td><a href="{{ route('admin.enquiries.show', $enquiry) }}" class="action-link-gold">View →</a></td>
                </tr>
                @empty
                <tr><td colspan="8" class="enquiry-empty">No resolved enquiries.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection