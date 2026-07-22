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
            'new_enquiries'   => Enquiry::where('status', 'unread')->count(),
            'total_categories'=> Category::count(),
        ];

        $recent_enquiries = Enquiry::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_enquiries'));
    }
}
