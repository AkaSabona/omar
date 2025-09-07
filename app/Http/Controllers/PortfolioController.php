<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolioItems = [
            [
                'id' => 1,
                'title' => 'E-commerce Website Redesign',
                'category' => 'Website Copy',
                'client' => 'Fashion Forward',
                'description' => 'Complete website copy overhaul that increased conversions by 65%',
                'image' => 'portfolio1.jpg',
                'tags' => ['Website Copy', 'E-commerce', 'Conversion Optimization']
            ],
            [
                'id' => 2,
                'title' => 'Email Marketing Campaign',
                'category' => 'Email Marketing',
                'client' => 'Tech Startup',
                'description' => 'Series of email campaigns that boosted engagement by 80%',
                'image' => 'portfolio2.jpg',
                'tags' => ['Email Marketing', 'Automation', 'Lead Nurturing']
            ],
            [
                'id' => 3,
                'title' => 'Social Media Content Strategy',
                'category' => 'Social Media',
                'client' => 'Lifestyle Brand',
                'description' => 'Content strategy that grew followers by 200% in 6 months',
                'image' => 'portfolio3.jpg',
                'tags' => ['Social Media', 'Content Strategy', 'Brand Voice']
            ],
            [
                'id' => 4,
                'title' => 'Sales Page Optimization',
                'category' => 'Sales Copy',
                'client' => 'Digital Course Creator',
                'description' => 'Sales page rewrite that doubled conversion rates',
                'image' => 'portfolio4.jpg',
                'tags' => ['Sales Copy', 'Landing Pages', 'Conversion']
            ],
            [
                'id' => 5,
                'title' => 'Blog Content Series',
                'category' => 'Blog Writing',
                'client' => 'B2B Software Company',
                'description' => 'SEO-optimized blog series that increased organic traffic by 150%',
                'image' => 'portfolio5.jpg',
                'tags' => ['Blog Writing', 'SEO', 'Content Marketing']
            ],
            [
                'id' => 6,
                'title' => 'Brand Messaging Framework',
                'category' => 'Brand Copy',
                'client' => 'Healthcare Startup',
                'description' => 'Complete brand voice and messaging framework development',
                'image' => 'portfolio6.jpg',
                'tags' => ['Brand Voice', 'Messaging', 'Strategy']
            ]
        ];
        
        return view('portfolio.index', compact('portfolioItems'));
    }

    public function show($id)
    {
        // In a real application, you would fetch this from a database
        $portfolioItems = [
            1 => [
                'id' => 1,
                'title' => 'E-commerce Website Redesign',
                'category' => 'Website Copy',
                'client' => 'Fashion Forward',
                'description' => 'Complete website copy overhaul that increased conversions by 65%',
                'image' => 'portfolio1.jpg',
                'tags' => ['Website Copy', 'E-commerce', 'Conversion Optimization'],
                'challenge' => 'The client\'s e-commerce site had low conversion rates and high bounce rates.',
                'solution' => 'Rewrote all product descriptions, homepage copy, and checkout flow messaging.',
                'results' => '65% increase in conversions, 40% decrease in bounce rate, 25% increase in average order value.',
                'testimonial' => 'The new copy transformed our business. Sales have never been better!'
            ],
            // Add more detailed portfolio items as needed
        ];
        
        $item = $portfolioItems[$id] ?? abort(404);
        
        return view('portfolio.show', compact('item'));
    }
}
