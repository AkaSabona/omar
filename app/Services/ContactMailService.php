<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

class ContactMailService
{
    public function __construct()
    {
        // Configure SMTP settings
        $this->configureSMTP();
    }

    private function configureSMTP()
    {
        Config::set([
            'mail.default' => 'smtp',
            'mail.mailers.smtp.transport' => 'smtp',
            'mail.mailers.smtp.host' => 'mail.cw-omargamal.com',
            'mail.mailers.smtp.port' => 465,
            'mail.mailers.smtp.encryption' => 'ssl',
            'mail.mailers.smtp.username' => 'omar@cw-omargamal.com',
            'mail.mailers.smtp.password' => 'A123a132#@!',
            'mail.mailers.smtp.timeout' => null,
            'mail.from.address' => 'omar@cw-omargamal.com',
            'mail.from.name' => 'Omar Gamal - Copywriter',
        ]);
    }

    public function sendContactEmail($contactData)
    {
        try {
            $recipientEmail = 'heshamnaeem18@outlook.com';
            
            $html = $this->buildEmailHtml($contactData);
            
            Mail::html($html, function ($message) use ($recipientEmail, $contactData) {
                $message->to($recipientEmail)
                        ->replyTo($contactData['email'], $contactData['name'])
                        ->subject('New Contact Form Submission from ' . $contactData['name']);
            });
            
            return true;
        } catch (\Exception $e) {
            \Log::error('Contact email failed: ' . $e->getMessage());
            return false;
        }
    }

    private function buildEmailHtml($data)
    {
        return '<div style="font-family:Arial,sans-serif;line-height:1.6;color:#222;max-width:600px;margin:0 auto;padding:20px;border:1px solid #ddd;border-radius:8px;">' .
            '<div style="background:#f8f9fa;padding:20px;border-radius:8px 8px 0 0;border-bottom:3px solid #007bff;">' .
            '<h2 style="margin:0;color:#007bff;text-align:center;">New Contact Form Submission</h2>' .
            '</div>' .
            '<div style="padding:20px;background:#fff;">' .
            '<p style="margin-bottom:20px;font-size:16px;">A new message was submitted via the website contact form at <strong>cw-omargamal.com</strong></p>' .
            '<div style="background:#f8f9fa;padding:15px;border-radius:5px;margin-bottom:20px;">' .
            '<h3 style="margin:0 0 15px;color:#333;border-bottom:2px solid #007bff;padding-bottom:5px;">Contact Details</h3>' .
            '<p style="margin:5px 0;"><strong>Name:</strong> ' . htmlspecialchars($data['name']) . '</p>' .
            '<p style="margin:5px 0;"><strong>Email:</strong> ' . htmlspecialchars($data['email']) . '</p>' .
            (isset($data['phone']) && $data['phone'] ? '<p style="margin:5px 0;"><strong>Phone:</strong> ' . htmlspecialchars($data['phone']) . '</p>' : '') .
            (isset($data['company']) && $data['company'] ? '<p style="margin:5px 0;"><strong>Company:</strong> ' . htmlspecialchars($data['company']) . '</p>' : '') .
            '<p style="margin:5px 0;"><strong>Submitted:</strong> ' . now()->format('F j, Y \\a\\t g:i A') . '</p>' .
            '</div>' .
            '<div style="background:#fff;padding:15px;border:1px solid #ddd;border-radius:5px;">' .
            '<h3 style="margin:0 0 15px;color:#333;border-bottom:2px solid #007bff;padding-bottom:5px;">Message</h3>' .
            '<div style="white-space:pre-wrap;line-height:1.6;">' . nl2br(htmlspecialchars($data['message'])) . '</div>' .
            '</div>' .
            '</div>' .
            '<div style="background:#f8f9fa;padding:15px;border-radius:0 0 8px 8px;text-align:center;">' .
            '<p style="margin:0;font-size:12px;color:#666;">You can reply directly to this email to contact the sender.</p>' .
            '</div>' .
            '</div>';
    }
}