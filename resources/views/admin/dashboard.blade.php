@extends('layouts.admin')
@section('title', 'Dashboard — BizMarket Admin')
@section('content')

<div class="admin-page-header">
    <div>
        <h1 class="admin-page-title">Dashboard</h1>
        <p class="admin-page-sub">Welcome back, {{ auth()->user()->name }}</p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-card-label">Total templates</div>
        <div class="stat-card-value">{{ $stats['total_templates'] }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-card-label">Total enquiries</div>
        <div class="stat-card-value">{{ $stats['total_enquiries'] }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-card-label">Unread enquiries</div>
        <div class="stat-card-value gold">{{ $stats['new_enquiries'] }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-card-label">Categories</div>
        <div class="stat-card-value">{{ $stats['total_categories'] }}</div>
    </div>
</div>

<div class="table-wrap">
    <div class="card-header-row">
        <h2 class="card-header-title">Recent enquiries</h2>
        <a href="{{ route('admin.enquiries.index') }}" class="card-header-link">View all →</a>
    </div>
    @if($recent_enquiries->count() > 0)
    <table class="data-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Business</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recent_enquiries as $enquiry)
            <tr class="{{ $enquiry->status === 'unread' ? 'row-unread' : '' }}">
                <td>{{ $enquiry->full_name }}</td>
                <td class="muted">{{ $enquiry->email }}</td>
                <td class="muted">{{ $enquiry->business_name ?? '—' }}</td>
                <td>
                    <span class="badge {{ $enquiry->status === 'unread' ? 'badge-yellow' : ($enquiry->status === 'resolved' ? 'badge-green' : 'badge-gray') }}">
                        {{ ucfirst($enquiry->status) }}
                    </span>
                </td>
                <td class="muted">{{ $enquiry->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div style="padding:48px;text-align:center;color:var(--text-muted);font-size:14px;">
        No enquiries yet. Submit the contact form to see one appear here.
    </div>
    @endif
</div>

@endsection