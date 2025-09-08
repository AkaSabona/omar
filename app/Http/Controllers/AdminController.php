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
        
        return view('admin.dashboard', compact('heroData', 'siteSettings', 'featuredClientWork', 'portfolioCards'));
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
            'astronaut_section_description' => 'required|string|max:1000',
            // Email & SMTP Settings
            'mail_enabled' => 'nullable|boolean',
            'admin_email' => 'nullable|email',
            'mail_host' => 'nullable|string|max:255',
            'mail_port' => 'nullable|integer|min:1|max:65535',
            'mail_encryption' => 'nullable|in:ssl,tls',
            'mail_username' => 'nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_from_address' => 'nullable|email',
            'mail_from_name' => 'nullable|string|max:255',
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

        // Email & SMTP settings persistence
        $siteSettings->mail_enabled = (bool) $request->boolean('mail_enabled');
        if (!empty($request->admin_email)) {
            $siteSettings->admin_email = $request->admin_email;
        }
        $siteSettings->mail_host = $request->mail_host ?: null;
        $siteSettings->mail_port = $request->mail_port ?: null;
        $siteSettings->mail_encryption = $request->mail_encryption ?: null;
        $siteSettings->mail_username = $request->mail_username ?: null;
        // Preserve existing password if left blank
        if ($request->filled('mail_password')) {
            $siteSettings->mail_password = $request->mail_password;
        }
        $siteSettings->mail_from_address = $request->mail_from_address ?: null;
        $siteSettings->mail_from_name = $request->mail_from_name ?: null;

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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:25600'
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
            'is_active' => 'sometimes|in:0,1'
        ]);

        $portfolioCard = PortfolioCard::findOrFail($id);
        
        $updateData = [
            'title' => $request->title,
            'description' => $request->description,
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
}