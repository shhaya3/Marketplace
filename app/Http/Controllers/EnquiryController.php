<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = Enquiry::latest()->paginate(20);
        return view('admin.enquiries.index', compact('enquiries'));
    }

    public function show(Enquiry $enquiry)
    {
        $enquiry->update(['status' => 'read']);
        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function update(Enquiry $enquiry)
    {
        $enquiry->update(['status' => request('status')]);
        return back()->with('success', 'Enquiry status updated.');
    }
}