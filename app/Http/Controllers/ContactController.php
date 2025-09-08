<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;

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

        // Send email notification to admin (configure ADMIN_EMAIL in .env)
        try {
            $adminEmail = env('ADMIN_EMAIL', 'omargamal@gmail.com');

            $mailData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'company' => $validated['company'] ?? null,
                'message' => $validated['message'],
                'subject' => 'New Contact Form Submission',
                'submitted_at' => now(),
            ];


            // Build minimal inline HTML without relying on a Blade email view
            $html = '<div style="font-family:Arial,sans-serif;line-height:1.6;color:#222">'
                .'<h2 style="margin:0 0 10px">'.$mailData['subject'].'</h2>'
                .'<p>A new message was submitted via the website contact form.</p>'
                .'<hr style="border:none;border-top:1px solid #eee;margin:16px 0">'
                .'<p><strong>Name:</strong> '.e($mailData['name']).'</p>'
                .'<p><strong>Email:</strong> '.e($mailData['email']).'</p>'
                .($mailData['phone'] ? '<p><strong>Phone:</strong> '.e($mailData['phone']).'</p>' : '')
                .($mailData['company'] ? '<p><strong>Company:</strong> '.e($mailData['company']).'</p>' : '')
                .'<p><strong>Submitted At:</strong> '.$mailData['submitted_at'].'</p>'
                .'<p style="white-space:pre-wrap"><strong>Message:</strong><br>'.nl2br(e($mailData['message'])).'</p>'
                .'<hr style="border:none;border-top:1px solid #eee;margin:16px 0">'
                .'<p style="font-size:12px;color:#666">You can reply directly to this email to contact the sender.</p>'
                .'</div>';

            Mail::html($html, function ($message) use ($adminEmail, $mailData) {
                $message->to($adminEmail)
                        ->replyTo($mailData['email'], $mailData['name'])
                        ->subject($mailData['subject'].' from '.$mailData['name']);
            });
        } catch (\Throwable $e) {
            // Silently fail email to avoid breaking UX; logs can be added if needed
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
