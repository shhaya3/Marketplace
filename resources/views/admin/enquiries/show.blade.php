@extends('layouts.admin')
@section('title', 'Enquiry #{{ $enquiry->id }} — BizMarket Admin')
@section('content')

<a href="{{ route('admin.enquiries.index') }}" class="back-link">← Back to enquiries</a>

<div class="table-wrap" style="margin-bottom:20px;">
    <div class="card-header-row">
        <h1 class="card-header-title" style="font-size:18px;">Enquiry #{{ $enquiry->id }}</h1>
        <span class="badge {{ $enquiry->status === 'unread' ? 'badge-yellow' : ($enquiry->status === 'resolved' ? 'badge-green' : 'badge-gray') }}">
            {{ ucfirst($enquiry->status) }}
        </span>
    </div>
    <div class="enquiry-detail-grid">
        <div>
            <div class="enquiry-field-label">Full name</div>
            <div class="enquiry-field-value">{{ $enquiry->full_name }}</div>
        </div>
        <div>
            <div class="enquiry-field-label">Email</div>
            <div class="enquiry-field-value">
                <a href="mailto:{{ $enquiry->email }}" class="action-link-gold">{{ $enquiry->email }}</a>
            </div>
        </div>
        <div>
            <div class="enquiry-field-label">Phone</div>
            <div class="enquiry-field-value">{{ $enquiry->phone ?? '—' }}</div>
        </div>
        <div>
            <div class="enquiry-field-label">Business name</div>
            <div class="enquiry-field-value">{{ $enquiry->business_name ?? '—' }}</div>
        </div>
        <div>
            <div class="enquiry-field-label">Business category</div>
            <div class="enquiry-field-value">{{ $enquiry->business_category ?? '—' }}</div>
        </div>
        <div>
            <div class="enquiry-field-label">Submitted on</div>
            <div class="enquiry-field-value">{{ $enquiry->created_at->format('d M Y, h:i A') }}</div>
        </div>
    </div>
    <div style="padding:0 24px 24px;">
        <div class="enquiry-field-label">Message</div>
        <div class="enquiry-message-box">{{ $enquiry->message }}</div>
    </div>
</div>

<div class="table-wrap" style="padding:20px 24px;">
    <h2 style="font-size:14px;font-weight:600;color:var(--navy);margin-bottom:14px;">Update status</h2>
    <form method="POST" action="{{ route('admin.enquiries.update', $enquiry) }}" class="status-form">
        @csrf @method('PATCH')
        <select name="status" class="form-select" style="max-width:200px;">
            <option value="unread"   {{ $enquiry->status === 'unread'   ? 'selected' : '' }}>Unread</option>
            <option value="read"     {{ $enquiry->status === 'read'     ? 'selected' : '' }}>Read</option>
            <option value="resolved" {{ $enquiry->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
        </select>
        <button type="submit" class="btn btn-navy btn-sm">Update</button>
    </form>
</div>

@endsection