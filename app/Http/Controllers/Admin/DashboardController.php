<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\Enquiry;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_templates' => Template::count(),
            'total_enquiries' => Enquiry::count(),
            'new_enquiries' => Enquiry::where('status', 'unread')->count(),
            'total_categories' => Category::count(),
        ];

        $recent_enquiries = Enquiry::latest()
            ->take(5)
            ->get();


        $statusCounts = Enquiry::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $perDay = Enquiry::where('created_at', '>=', now()->subDays(13)->startOfDay())
            ->selectRaw('DATE(created_at) as day, COUNT(*) as total')
            ->groupBy('day')
            ->pluck('total', 'day');

        $days = collect(range(13, 0))->map(fn($i) => now()->subDays($i)->toDateString());

        $topTemplates = Template::orderByDesc('view_count')->take(5)->get(['name', 'view_count']);

        $charts = [
            'status' => [
                'labels' => ['Unread', 'Read', 'Resolved'],
                'values' => [
                    (int) ($statusCounts['unread'] ?? 0),
                    (int) ($statusCounts['read'] ?? 0),
                    (int) ($statusCounts['resolved'] ?? 0),
                ],
            ],
            'daily' => [
                'labels' => $days->map(fn($d) => \Carbon\Carbon::parse($d)->format('d M'))->values(),
                'values' => $days->map(fn($d) => (int) ($perDay[$d] ?? 0))->values(),
            ],
            'top' => [
                'labels' => $topTemplates->pluck('name'),
                'values' => $topTemplates->pluck('view_count')->map(fn($v) => (int) $v),
            ],
        ];
        return view('admin.dashboard', compact('stats', 'recent_enquiries', 'charts'));;
    }
}
