<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BizMarket enquiries</title>
    <style>{!! $css !!}</style>
</head>
<body>
    <div class="pdf-head">
        <h1 class="pdf-title">BizMarket — Enquiries</h1>
        <p class="pdf-meta">
            Generated {{ now()->format('d M Y, H:i') }}
            @if($status) · Status: {{ ucfirst($status) }} @endif
            · {{ $enquiries->count() }} {{ \Illuminate\Support\Str::plural('enquiry', $enquiries->count()) }}
        </p>
    </div>

    <table class="pdf-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Business</th>
                <th>Category</th>
                <th>Message</th>
                <th>Status</th>
                <th>Received</th>
            </tr>
        </thead>
        <tbody>
            @forelse($enquiries as $e)
            <tr>
                <td>{{ $e->id }}</td>
                <td>{{ $e->full_name }}</td>
                <td>{{ $e->email }}</td>
                <td>{{ $e->phone }}</td>
                <td>{{ $e->business_name }}</td>
                <td>{{ ucfirst((string) $e->business_category) }}</td>
                <td>{{ \Illuminate\Support\Str::limit($e->message, 90) }}</td>
                <td>{{ ucfirst($e->status) }}</td>
                <td>{{ $e->created_at?->format('d M Y') }}</td>
            </tr>
            @empty
            <tr><td colspan="9" class="pdf-empty">No enquiries found.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>