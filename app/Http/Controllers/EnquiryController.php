<?php

namespace App\Http\Controllers;

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

    // Add this method to handle the POST /enquiries form submission
    public function store()
    {
    $validated = request()->validate([
        'full_name'         => 'required|string|max:255',
        'email'             => 'required|email:rfc,dns|max:255',
        'phone'             => 'nullable|string|max:20|regex:/^(?=(?:\D*\d){10})[0-9+\-\s()]+$/',
        'business_name'     => 'nullable|string|max:255',
        'business_category' => 'nullable|string|max:100',
        'message'           => 'required|string|min:10|max:1000',
    ], [
        'full_name.required' => 'Please tell us your name.',
        'email.required'     => 'We need an email address to get back to you.',
        'email.email'        => 'That doesn\'t look like a valid email address.',
        'phone.regex'        => 'Please enter a valid phone number.',
        'message.required'   => 'Please tell us a bit about what you need.',
        'message.min'        => 'Could you add a little more detail? At least 10 characters.',
    ]);

    Enquiry::create($validated);

    return back()->with('success', 'Your enquiry has been submitted. We will get back to you within one working day.');
    }
}