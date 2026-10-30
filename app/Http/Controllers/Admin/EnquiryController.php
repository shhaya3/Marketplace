<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;


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

    public function exportCsv(Request $request)
    {
        $query = Enquiry::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $filename = 'enquiries-' . now()->format('Y-m-d') . '.csv';

        // Stops a cell from being run as a formula when opened in Excel
        $safe = fn($v) => preg_match('/^[=+\-@]/', (string) $v) ? "'" . $v : (string) $v;

        return response()->streamDownload(function () use ($query, $safe) {
            $out = fopen('php://output', 'w');
            fwrite($out, "\xEF\xBB\xBF"); // lets Excel read UTF-8 correctly

            fputcsv($out, ['ID', 'Name', 'Email', 'Phone', 'Business', 'Category', 'Message', 'Status', 'Received']);

            foreach ($query->lazy() as $e) {
                fputcsv($out, [
                    $e->id,
                    $safe($e->full_name),
                    $safe($e->email),
                    $safe($e->phone),
                    $safe($e->business_name),
                    $safe(ucfirst((string) $e->business_category)),
                    $safe($e->message),
                    $e->status,
                    $e->created_at?->format('Y-m-d H:i'),
                ]);
            }

            fclose($out);
        }, $filename, ['Content-Type' => 'text/csv; charset=UTF-8']);
    }

    public function exportPdf(Request $request)
    {
        $query = Enquiry::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $enquiries = $query->limit(500)->get();

        $pdf = Pdf::loadView('admin.enquiries.pdf', [
            'enquiries' => $enquiries,
            'status' => $request->status,
            'css' => file_get_contents(public_path('css/enquiry-pdf.css')),
        ])->setPaper('a4', 'landscape');

        return $pdf->download('enquiries-' . now()->format('Y-m-d') . '.pdf');
    }
}