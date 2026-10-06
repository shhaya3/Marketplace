@extends('layouts.admin')
@section('title', 'Enquiry #{{ $enquiry->id }} — BizMarket Admin')
@section('content')

<a href="{{ route('admin.enquiries.index') }}" class="back-link">← Back to enquiries</a>

<div class="enq-card">
    <div class="enq-card-header">
        <div>
            <h1 class="enq-card-title">Enquiry #{{ $enquiry->id }}</h1>
            <p class="enq-card-sub">Submitted {{ $enquiry->created_at->format('d M Y, h:i A') }}</p>
        </div>
        <span class="badge {{ $enquiry->status === 'unread' ? 'badge-yellow' : ($enquiry->status === 'resolved' ? 'badge-green' : 'badge-gray') }}">
            {{ ucfirst($enquiry->status) }}
        </span>
    </div>

    <div class="enq-field-grid">
        <div class="enq-field">
            <div class="enq-field-label">Full name</div>
            <div class="enq-field-value">{{ $enquiry->full_name }}</div>
        </div>
        <div class="enq-field">
            <div class="enq-field-label">Email</div>
            <div class="enq-field-value">
                <a href="mailto:{{ $enquiry->email }}" class="enq-field-link">{{ $enquiry->email }}</a>
            </div>
        </div>
        <div class="enq-field">
            <div class="enq-field-label">Phone</div>
            <div class="enq-field-value">
                @if($enquiry->phone)
                    <a href="tel:{{ $enquiry->phone }}" class="enq-field-link">{{ $enquiry->phone }}</a>
                @else
                    <span class="enq-field-empty">Not provided</span>
                @endif
            </div>
        </div>
        <div class="enq-field">
            <div class="enq-field-label">Business name</div>
            <div class="enq-field-value">{{ $enquiry->business_name ?? '—' }}</div>
        </div>
        <div class="enq-field">
            <div class="enq-field-label">Business category</div>
            <div class="enq-field-value">
                @if($enquiry->business_category)
                    <span class="enq-category-pill">{{ ucfirst($enquiry->business_category) }}</span>
                @else
                    <span class="enq-field-empty">Not specified</span>
                @endif
            </div>
        </div>
        <div class="enq-field">
            <div class="enq-field-label">Enquiry ID</div>
            <div class="enq-field-value">#{{ $enquiry->id }}</div>
        </div>
    </div>

    <div class="enq-message-block">
        <div class="enq-field-label">Message</div>
        <div class="enq-message-box">{{ $enquiry->message }}</div>
    </div>
</div>

<div class="enq-status-card">
    <h2 class="enq-status-title">Update status</h2>
    <form method="POST" action="{{ route('admin.enquiries.update', $enquiry) }}" class="status-form">
        @csrf @method('PATCH')
        <select name="status" class="form-select">
            <option value="unread" {{ $enquiry->status === 'unread' ? 'selected' : '' }}>Unread</option>
            <option value="read" {{ $enquiry->status === 'read' ? 'selected' : '' }}>Read</option>
            <option value="resolved" {{ $enquiry->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
        </select>
        <button type="submit" class="btn btn-navy btn-sm">Update</button>
    </form>
</div>

@endsection