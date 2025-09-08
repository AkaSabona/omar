<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use App\Models\SiteSetting;
use App\Services\ContactMailService;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'company' => 'nullable|string|max:255',
                'message' => 'required|string|min:50'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors for AJAX requests
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please correct the errors and try again.',
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e; // Re-throw for normal requests
        }

        // Save to database with default values for removed fields
        $savedMessage = Message::create(array_merge($validated, [
            'subject' => 'Contact Form Submission',
            'project_type' => null,
            'budget' => null,
            'timeline' => null,
            'industry' => null,
            'additional_services' => null,
            'referral_source' => null,
            'privacy_agreement' => true
        ]));

        // Send email notification using dedicated mail service
        try {
            $mailService = new ContactMailService();
            $mailService->sendContactEmail($validated);
        } catch (\Throwable $e) {
            // Silently fail email to avoid breaking UX; logs can be added if needed
            \Log::error('Contact form email failed: ' . $e->getMessage());
        }

        // Check if this is an AJAX request
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! I\'ll get back to you within 24 hours.'
            ]);
        }

        return redirect(route('home') . '#cta-section')
                        ->with('success', 'Thank you for your message! I\'ll get back to you within 24 hours.');
    }
}
