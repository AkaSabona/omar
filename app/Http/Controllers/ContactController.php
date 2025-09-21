<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\Message;
use App\Models\SiteSetting;

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

        // Prepare email notification data
        try {
            $adminEmail = env('ADMIN_EMAIL', 'omargamal@gmail.com');
            
            // Try to load SMTP and recipient settings from SiteSetting if available
            $settings = SiteSetting::first();
            if ($settings) {
                if (!empty($settings->admin_email)) {
                    $adminEmail = $settings->admin_email;
                }
                // Dynamically override mail configuration if SMTP settings exist
                if (!empty($settings->mail_host) && !empty($settings->mail_port)) {
                    config([
                        'mail.default' => 'smtp',
                        'mail.mailers.smtp.host' => $settings->mail_host,
                        'mail.mailers.smtp.port' => (int) $settings->mail_port,
                        'mail.mailers.smtp.encryption' => $settings->mail_encryption ?: null,
                        'mail.mailers.smtp.username' => $settings->mail_username ?: null,
                        'mail.mailers.smtp.password' => $settings->mail_password ?: null,
                        'mail.from.address' => $settings->mail_from_address ?: env('MAIL_FROM_ADDRESS'),
                        'mail.from.name' => $settings->mail_from_name ?: env('MAIL_FROM_NAME', config('app.name')),
                    ]);
                }
            }

            $mailData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'company' => $validated['company'] ?? null,
                'message' => $validated['message'],
                'subject' => '📧 New Project Message',
                'submitted_at' => now(),
            ];


            // Build simple and clean email template with good design
            $html = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>📧 New Project Message </title>
            </head>
            <body style="margin:0;padding:0;background-color:#f5f5f5;font-family:-apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,Arial,sans-serif;">
                <div style="max-width:600px;margin:30px auto;background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                    
                    <!-- Header -->
                    <div style="background:#4f46e5;padding:30px;text-align:center;">
                        <h1 style="color:#ffffff;margin:0;font-size:24px;font-weight:600;">
                            📧 New Project Message
                        </h1>
                       
                    </div>
                    
                    <!-- Content -->
                    <div style="padding:30px;">
                        
                        <!-- Contact Information -->
                        <div style="background:#f8fafc;border-radius:8px;padding:24px;margin-bottom:24px;border-left:4px solid #4f46e5;">
                            <h2 style="color:#1f2937;margin:0 0 16px;font-size:18px;font-weight:600;">
                                Contact Details
                            </h2>
                            
                            <div style="space-y:12px;">
                                <div style="margin-bottom:12px;">
                                    <span style="color:#6b7280;font-size:14px;font-weight:500;display:block;margin-bottom:4px;">Name</span>
                                    <span style="color:#1f2937;font-size:16px;font-weight:600;">'.e($mailData['name']).'</span>
                                </div>
                                
                                <div style="margin-bottom:12px;">
                                    <span style="color:#6b7280;font-size:14px;font-weight:500;display:block;margin-bottom:4px;">Email</span>
                                    <a href="mailto:'.e($mailData['email']).'" style="color:#4f46e5;font-size:16px;font-weight:600;text-decoration:none;">'.e($mailData['email']).'</a>
                                </div>'
                                .($mailData['phone'] ? '
                                <div style="margin-bottom:12px;">
                                    <span style="color:#6b7280;font-size:14px;font-weight:500;display:block;margin-bottom:4px;">Phone</span>
                                    <a href="tel:'.e($mailData['phone']).'" style="color:#4f46e5;font-size:16px;font-weight:600;text-decoration:none;">'.e($mailData['phone']).'</a>
                                </div>' : '')
                                .($mailData['company'] ? '
                                <div style="margin-bottom:12px;">
                                    <span style="color:#6b7280;font-size:14px;font-weight:500;display:block;margin-bottom:4px;">Company</span>
                                    <span style="color:#1f2937;font-size:16px;font-weight:600;">'.e($mailData['company']).'</span>
                                </div>' : '').
                                '<div style="margin-bottom:0;">
                                    <span style="color:#6b7280;font-size:14px;font-weight:500;display:block;margin-bottom:4px;">Submitted</span>
                                    <span style="color:#1f2937;font-size:16px;font-weight:600;">'.$mailData['submitted_at'].'</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Message -->
                        <div style="background:#ffffff;border-radius:8px;padding:24px;border:1px solid #e5e7eb;">
                            <h2 style="color:#1f2937;margin:0 0 16px;font-size:18px;font-weight:600;">
                                Message
                            </h2>
                            <div style="background:#f9fafb;border-radius:6px;padding:16px;border-left:3px solid #10b981;">
                                <p style="color:#1f2937;line-height:1.6;margin:0;font-size:15px;white-space:pre-wrap;">'.nl2br(e($mailData['message'])).'</p>
                            </div>
                        </div>
                        
                        <!-- Reply Button -->
                        <div style="text-align:center;margin:24px 0;">
                            <a href="mailto:'.e($mailData['email']).'" style="background:#4f46e5;color:#ffffff;padding:12px 24px;border-radius:6px;text-decoration:none;font-weight:600;font-size:16px;display:inline-block;">
                                Reply to '.e($mailData['name']).'
                            </a>
                        </div>
                    </div>
                    
                    <!-- Footer -->
                    <div style="background:#f9fafb;padding:20px;text-align:center;border-top:1px solid #e5e7eb;">
                        <p style="color:#6b7280;margin:0;font-size:14px;">
                            This email was sent from your website contact form.
                        </p>
                    </div>
                </div>
            </body>
            </html>';

            Mail::html($html, function ($message) use ($adminEmail, $mailData) {
                $message->to($adminEmail)
                        ->replyTo($mailData['email'], $mailData['name'])
                        ->subject($mailData['subject'].' from '.$mailData['name']);
            });

        } catch (\Throwable $e) {
            // Log the error to diagnose issues without exposing sensitive data
            Log::error('Failed to send contact email', [
                'to' => isset($adminEmail) ? $adminEmail : null,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            // Silently fail email to avoid breaking UX; logs can be reviewed in storage/logs/laravel.log
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
