<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the reviews management page.
     */
    public function index()
    {
        $testimonialsData = $this->getTestimonialsData();
        return view('admin.reviews.index', compact('testimonialsData'));
    }

    /**
     * Update testimonials data.
     */
    public function updateTestimonials(Request $request)
    {
        $request->validate([
            'testimonials_title' => 'required|string|max:255',
            'testimonials_subtitle' => 'required|string|max:1000',
            'testimonials' => 'required|array|size:3',
            'testimonials.*.content' => 'required|string|max:1000',
            'testimonials.*.name' => 'required|string|max:150',
            'testimonials.*.position' => 'required|string|max:150',
            'testimonials.*.logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get existing testimonials data to preserve logos
        $existingData = $this->getTestimonialsData();
        $testimonials = $request->input('testimonials');
        
        // Process each testimonial and handle logo uploads
        foreach ($testimonials as $index => $testimonial) {
            // Handle logo upload
            if ($request->hasFile("testimonials.{$index}.logo")) {
                $logoFile = $request->file("testimonials.{$index}.logo");
                $logoName = 'testimonial_logo_' . $index . '_' . time() . '.' . $logoFile->getClientOriginalExtension();
                $logoPath = $logoFile->storeAs('images/testimonials', $logoName, 'public');
                $testimonials[$index]['logo'] = 'storage/' . $logoPath;
            } else {
                // Keep existing logo if no new file uploaded
                $testimonials[$index]['logo'] = $existingData['items'][$index]['logo'] ?? null;
            }
        }

        $data = [
            'title' => $request->input('testimonials_title'),
            'subtitle' => $request->input('testimonials_subtitle'),
            'items' => array_values($testimonials),
        ];

        $this->saveTestimonialsData($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Client testimonials updated successfully!');
    }

    /**
     * Get testimonials data from storage.
     */
    private function getTestimonialsData()
    {
        $default = [
            'title' => 'What Clients Say',
            'subtitle' => 'Real feedback from real clients about their project experiences.',
            'items' => [
                [
                    'content' => 'The website copy transformation was incredible. Our conversion rate jumped from 2% to 6.5% within the first month. ROI was immediate.',
                    'name' => 'Sarah Johnson',
                    'position' => 'Fashion Forward CEO',
                    'logo' => null,
                ],
                [
                    'content' => 'Our email campaigns went from being eagerly anticipated to being ignored to tripled open rates and sales from email increased by 400%.',
                    'name' => 'Michael Chen',
                    'position' => 'Tech Startup Founder',
                    'logo' => null,
                ],
                [
                    'content' => 'The content strategy completely transformed our brand voice. We went from generic to memorable, and our engagement rates soared.',
                    'name' => 'Emily Rodriguez',
                    'position' => 'Lifestyle Brand Director',
                    'logo' => null,
                ],
            ],
        ];

        $filePath = storage_path('app/admin/testimonials_home.json');
        if (File::exists($filePath)) {
            $data = json_decode(File::get($filePath), true);
            return $data ?: $default;
        }

        return $default;
    }

    /**
     * Save testimonials data to storage.
     */
    private function saveTestimonialsData(array $data): void
    {
        $directory = storage_path('app/admin');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }
        File::put(storage_path('app/admin/testimonials_home.json'), json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
    }
}