<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\SiteSetting;
use App\Models\FeaturedClientWork;
use App\Models\PortfolioCard;
use App\Models\Experience;
use App\Models\Logo;

class HomeController extends Controller
{
    public function index()
    {
        $heroData = $this->getHeroData();
        $animationData = $this->getAnimationData();
        $siteSettings = SiteSetting::first();
        $featuredClientWork = FeaturedClientWork::first();
        $portfolioCards = PortfolioCard::active()->ordered()->get();
        $experiences = Experience::active()->ordered()->get();
        $logos = Logo::where('is_active', true)->orderBy('position')->get();
        $testimonialsData = $this->getTestimonialsData();
        return view('home', compact('heroData', 'animationData', 'siteSettings', 'featuredClientWork', 'portfolioCards', 'experiences', 'logos', 'testimonialsData'));
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

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $services = [
            [
                'title' => 'Website Copywriting',
                'description' => 'Compelling web copy that converts visitors into customers',
                'icon' => 'fas fa-globe'
            ],
            [
                'title' => 'Email Marketing',
                'description' => 'Engaging email campaigns that drive results',
                'icon' => 'fas fa-envelope'
            ],
            [
                'title' => 'Content Strategy',
                'description' => 'Strategic content planning for maximum impact',
                'icon' => 'fas fa-chart-line'
            ],
            [
                'title' => 'Social Media Content',
                'description' => 'Creative social media posts that engage audiences',
                'icon' => 'fab fa-social-network'
            ],
            [
                'title' => 'Blog Writing',
                'description' => 'SEO-optimized blog posts that rank and convert',
                'icon' => 'fas fa-pen-alt'
            ],
            [
                'title' => 'Sales Copy',
                'description' => 'Persuasive sales copy that drives conversions',
                'icon' => 'fas fa-dollar-sign'
            ]
        ];
        
        return view('services', compact('services'));
    }

    public function blog()
    {
        $posts = [
            [
                'title' => 'The Art of Persuasive Copywriting',
                'excerpt' => 'Learn the fundamental principles that make copy convert...',
                'date' => '2024-01-15',
                'image' => 'blog1.jpg'
            ],
            [
                'title' => 'Content Marketing Trends for 2024',
                'excerpt' => 'Stay ahead of the curve with these emerging trends...',
                'date' => '2024-01-10',
                'image' => 'blog2.jpg'
            ],
            [
                'title' => 'Building Brand Voice Through Words',
                'excerpt' => 'How to develop a consistent brand voice that resonates...',
                'date' => '2024-01-05',
                'image' => 'blog3.jpg'
            ]
        ];
        
        return view('blog', compact('posts'));
    }

    public function testimonials()
    {
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'company' => 'TechStart Inc.',
                'position' => 'Marketing Director',
                'industry' => 'SaaS',
                'content' => 'Working with Omar transformed our entire marketing approach. His copy didn\'t just sound good - it converted. Our landing page conversion rate jumped from 2.1% to 8.7% within the first month.',
                'result' => '+315% Conversion Rate',
                'rating' => 5
            ],
            [
                'name' => 'Michael Chen',
                'company' => 'E-commerce Plus',
                'position' => 'CEO',
                'industry' => 'Ecommerce',
                'content' => 'Omar\'s email campaigns generated over $180k in revenue in just 3 months. His understanding of customer psychology is remarkable. Every email feels personal yet professional.',
                'result' => '$180k Revenue Generated',
                'rating' => 5
            ],
            [
                'name' => 'Emily Rodriguez',
                'company' => 'Digital Agency Pro',
                'position' => 'Creative Director',
                'industry' => 'Education',
                'content' => 'As an agency, we\'ve worked with many copywriters, but Omar stands out. His strategic approach and attention to detail helped us increase client retention by 60%.',
                'result' => '+60% Client Retention',
                'rating' => 5
            ],
            [
                'name' => 'David Thompson',
                'company' => 'HealthTech Solutions',
                'position' => 'Founder',
                'industry' => 'Healthcare',
                'content' => 'Omar took our complex medical technology and made it accessible to our target audience. Our demo requests increased by 250% after implementing his copy.',
                'result' => '+250% Demo Requests',
                'rating' => 5
            ],
            [
                'name' => 'Lisa Park',
                'company' => 'Financial Advisors Group',
                'position' => 'Managing Partner',
                'industry' => 'Finance',
                'content' => 'Trust is everything in finance, and Omar\'s copy helped us build that trust with prospects. Our consultation bookings doubled in the first quarter.',
                'result' => '+100% Consultations',
                'rating' => 5
            ],
            [
                'name' => 'James Wilson',
                'company' => 'Retail Revolution',
                'position' => 'Marketing Manager',
                'industry' => 'Ecommerce',
                'content' => 'Omar\'s product descriptions transformed our online store. Not only did our conversion rate improve, but our average order value increased by 35%.',
                'result' => '+35% Average Order Value',
                'rating' => 5
            ],
            [
                'name' => 'Maria Garcia',
                'company' => 'Learning Hub',
                'position' => 'Director of Marketing',
                'industry' => 'Education',
                'content' => 'Our course enrollment increased by 180% after Omar rewrote our sales pages. His ability to connect with our audience is unmatched.',
                'result' => '+180% Course Enrollment',
                'rating' => 5
            ],
            [
                'name' => 'Robert Kim',
                'company' => 'CloudTech Innovations',
                'position' => 'VP of Sales',
                'industry' => 'SaaS',
                'content' => 'Omar\'s sales copy helped us close deals 40% faster. His understanding of the B2B sales process is evident in every piece he writes.',
                'result' => '40% Faster Sales Cycle',
                'rating' => 5
            ],
            [
                'name' => 'Jennifer Adams',
                'company' => 'Wellness Brands Co.',
                'position' => 'Brand Manager',
                'industry' => 'Healthcare',
                'content' => 'Omar helped us launch our new wellness product line with copy that resonated perfectly with our health-conscious audience. Sales exceeded projections by 120%.',
                'result' => '+120% Sales vs Projections',
                'rating' => 5
            ]
        ];
        
        return view('testimonials', compact('testimonials'));
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
}
