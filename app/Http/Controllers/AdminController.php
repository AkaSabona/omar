<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\SiteSetting;
use App\Models\FeaturedClientWork;
use App\Models\PortfolioCard;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $heroData = $this->getHeroData();
        $siteSettings = SiteSetting::first();
        $featuredClientWork = FeaturedClientWork::first();
        $portfolioCards = PortfolioCard::active()->ordered()->get();
        $testimonialsData = $this->getTestimonialsData();
        
        return view('admin.dashboard', compact('heroData', 'siteSettings', 'featuredClientWork', 'portfolioCards', 'testimonialsData'));
    }

    public function portfolioCards()
    {
        $portfolioCards = PortfolioCard::ordered()->get();
        
        return view('admin.portfolio-cards', compact('portfolioCards'));
    }

    public function updateHero(Request $request)
    {
        $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:500',
            'hero_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:20480'
        ], [
            'hero_image.image' => 'The uploaded file must be an image.',
            'hero_image.mimes' => 'The image must be a file of type: jpeg, jpg, png, gif, or webp.',
            'hero_image.max' => 'The image may not be greater than 20MB.'
        ]);

        $heroData = $this->getHeroData();
        $heroData['title'] = $request->hero_title;
        $heroData['subtitle'] = $request->hero_subtitle;

        // Handle image upload
        if ($request->hasFile('hero_image')) {
            $image = $request->file('hero_image');
            $imageName = 'hero_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $heroData['image'] = 'images/' . $imageName;
        }

        $this->saveHeroData($heroData);

        return redirect()->route('admin.dashboard')->with('success', 'Hero section updated successfully!');
    }

    public function updateAnimations(Request $request)
    {
        $request->validate([
            'scroll_scale_enabled' => 'boolean',
            'animation_duration' => 'numeric|min:0.1|max:10',
            'animation_delay' => 'numeric|min:0|max:5'
        ]);

        $animationData = [
            'scroll_scale_enabled' => $request->has('scroll_scale_enabled'),
            'animation_duration' => $request->animation_duration ?? 2,
            'animation_delay' => $request->animation_delay ?? 0.3
        ];

        $this->saveAnimationData($animationData);

        return redirect()->route('admin.dashboard')->with('success', 'Animation settings updated successfully!');
    }

    private function getHeroData()
    {
        $defaultData = [
            'title' => 'Copywriter &<br><span class="gradient-text">Content Creator</span>',
            'subtitle' => 'Transforming ideas into compelling content that drives results and engages audiences.',
            'image' => 'images/me.png'
        ];

        $filePath = storage_path('app/admin/hero_data.json');
        
        if (File::exists($filePath)) {
            $data = json_decode(File::get($filePath), true);
            return array_merge($defaultData, $data);
        }

        return $defaultData;
    }

    private function saveHeroData($data)
    {
        $directory = storage_path('app/admin');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        File::put(storage_path('app/admin/hero_data.json'), json_encode($data, JSON_PRETTY_PRINT));
    }

    private function getAnimationData()
    {
        $defaultData = [
            'scroll_scale_enabled' => true,
            'animation_duration' => 2,
            'animation_delay' => 0.3
        ];

        $filePath = storage_path('app/admin/animation_data.json');
        
        if (File::exists($filePath)) {
            $data = json_decode(File::get($filePath), true);
            return array_merge($defaultData, $data);
        }

        return $defaultData;
    }

    private function saveAnimationData($data)
    {
        $directory = storage_path('app/admin');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        File::put(storage_path('app/admin/animation_data.json'), json_encode($data, JSON_PRETTY_PRINT));
    }

    public function getAnimationSettings()
    {
        return response()->json($this->getAnimationData());
    }

    public function updateSiteSettings(Request $request)
    {
        $request->validate([
            'projects_count' => 'required|string|max:10',
            'avg_increase' => 'required|string|max:10',
            'years_experience' => 'required|string|max:10',
            'profile_name' => 'required|string|max:100',
            'profile_title' => 'required|string|max:100',
            'profile_skills' => 'required|array|min:1',
            'profile_skills.*' => 'required|string|max:50',
            'astronaut_section_title' => 'required|string|max:255',
            'astronaut_section_description' => 'required|string|max:1000'
        ]);

        $siteSettings = SiteSetting::first();
        if (!$siteSettings) {
            $siteSettings = new SiteSetting();
        }

        $siteSettings->projects_count = $request->projects_count;
        $siteSettings->avg_increase = $request->avg_increase;
        $siteSettings->years_experience = $request->years_experience;
        $siteSettings->profile_name = $request->profile_name;
        $siteSettings->profile_title = $request->profile_title;
        $siteSettings->profile_skills = $request->profile_skills;
        $siteSettings->astronaut_section_title = $request->astronaut_section_title;
        $siteSettings->astronaut_section_description = $request->astronaut_section_description;
        $siteSettings->save();

        return redirect()->route('admin.dashboard')->with('success', 'Site settings updated successfully!');
    }

    public function updateFeaturedClientWork(Request $request)
    {
        $request->validate([
            'featured_title' => 'required|string|max:255',
            'featured_subtitle' => 'required|string|max:1000'
        ]);

        $featuredClientWork = FeaturedClientWork::first();
        if (!$featuredClientWork) {
            $featuredClientWork = new FeaturedClientWork();
        }

        $featuredClientWork->title = $request->featured_title;
        $featuredClientWork->subtitle = $request->featured_subtitle;
        $featuredClientWork->save();

        return redirect()->route('admin.dashboard')->with('success', 'Featured Client Work section updated successfully!');
    }

    public function storePortfolioCard(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:25600',
            'youtube_url' => 'nullable|url'
        ]);

        $maxPosition = PortfolioCard::max('position') ?? 0;
        
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolio', 'public');
        }

        PortfolioCard::create([
            'title' => $request->title,
            'description' => $request->description,
            'background_class' => 'custom-bg', // Default background class
            'image' => $imagePath,
            'youtube_url' => $request->youtube_url,
            'position' => $maxPosition + 1,
            'is_active' => true
        ]);

        return redirect()->route('admin.portfolio-cards')->with('success', 'Portfolio card added successfully!');
    }

    public function updatePortfolioCard(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:25600',
            'is_active' => 'sometimes|in:0,1',
            'youtube_url' => 'nullable|url'
        ]);

        $portfolioCard = PortfolioCard::findOrFail($id);
        
        $updateData = [
            'title' => $request->title,
            'description' => $request->description,
            'youtube_url' => $request->youtube_url,
        ];
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($portfolioCard->image && Storage::disk('public')->exists($portfolioCard->image)) {
                Storage::disk('public')->delete($portfolioCard->image);
            }
            $updateData['image'] = $request->file('image')->store('portfolio', 'public');
        }
        
        // Handle is_active field properly
        if ($request->has('is_active')) {
            $updateData['is_active'] = $request->is_active == '1' || $request->is_active === true;
        }
        
        $portfolioCard->update($updateData);

        return redirect()->route('admin.portfolio-cards')->with('success', 'Portfolio card updated successfully!');
    }

    public function deletePortfolioCard($id)
    {
        $portfolioCard = PortfolioCard::findOrFail($id);
        $portfolioCard->delete();

        return redirect()->route('admin.portfolio-cards')->with('success', 'Portfolio card deleted successfully!');
    }

    public function updatePortfolioCardPositions(Request $request)
    {
        $request->validate([
            'positions' => 'required|array',
            'positions.*' => 'required|integer'
        ]);

        foreach ($request->positions as $id => $position) {
            PortfolioCard::where('id', $id)->update(['position' => $position]);
        }

        return response()->json(['success' => true]);
    }

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

        return redirect()->route('admin.dashboard')->with('success', 'Client testimonials updated successfully!');
    }

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
            if (is_array($data)) {
                // Merge with defaults to ensure structure
                $data['items'] = $data['items'] ?? $default['items'];
                return array_merge($default, $data);
            }
        }
        return $default;
    }

    private function saveTestimonialsData(array $data): void
    {
        $directory = storage_path('app/admin');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }
        File::put(storage_path('app/admin/testimonials_home.json'), json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
    }
}