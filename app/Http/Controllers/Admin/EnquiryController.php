<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        $unread = Enquiry::where('status', 'unread')->latest()->get();
        $read = Enquiry::where('status', 'read')->latest()->get();
        $resolved = Enquiry::where('status', 'resolved')->latest()->get();

        return view('admin.enquiries.index', compact('unread', 'read', 'resolved'));
    }

    public function show(Enquiry $enquiry)
    {
        // Pure read-only view: will never overwrite 'resolved' or 'unread'
        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function update(Request $request, Enquiry $enquiry)
    {
        $validated = $request->validate([
            'status' => 'required|in:unread,read,resolved',
        ]);

        $enquiry->update(['status' => $validated['status']]);

        return back()->with('success', 'Enquiry status updated to ' . ucfirst($validated['status']) . '.');
    }
}