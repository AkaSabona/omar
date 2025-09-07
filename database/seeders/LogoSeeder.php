<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Logo;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logos = [
            [
                'title' => 'Energizer',
                'description' => 'Global battery and portable lighting company',
                'start_date' => '2020-01',
                'end_date' => '2023-12',
                'read_more' => 'Worked on comprehensive brand messaging and product launch campaigns for Energizer\'s new battery line. Developed compelling copy that highlighted the long-lasting power and reliability of their products.',
                'position' => 1,
                'is_active' => true,
                'popup_title' => 'Energizer - Power That Lasts',
                'popup_description' => 'Strategic copywriting for Energizer\'s regional campaigns, focusing on durability and reliability messaging that resonates with Middle Eastern consumers.',
                'popup_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'popup_content' => [
                    'Developed compelling product descriptions for battery packaging',
                    'Created social media campaigns highlighting long-lasting performance',
                    'Wrote email marketing sequences for B2B partnerships',
                    'Crafted taglines that emphasize trust and reliability'
                ],
                'popup_additional_sections' => [
                    [
                        'title' => 'Campaign Results',
                        'items' => [
                            'Increased brand awareness by 45% in target markets',
                            'Boosted product sales by 30% during campaign period',
                            'Generated 2.5M+ social media impressions',
                            'Achieved 85% positive sentiment in brand mentions'
                        ]
                    ],
                    [
                        'title' => 'Content Samples',
                        'items' => [
                            'Product tagline: "Power that never quits, just like you"',
                            'Social media series: "Energizer Moments" - real-life scenarios',
                            'Email subject lines with 40%+ open rates',
                            'B2B partnership proposals with 70% acceptance rate'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Tamara',
                'description' => 'Leading buy now, pay later platform in MENA',
                'start_date' => '2021-06',
                'end_date' => '2024-01',
                'read_more' => 'Created user-friendly copy for Tamara\'s mobile app and website, focusing on simplifying the payment process and building trust with customers across the Middle East.',
                'position' => 2,
                'is_active' => true,
                'popup_title' => 'Tamara - Buy Now, Pay Later Revolution',
                'popup_description' => 'Content strategy and copywriting for the leading BNPL platform in MENA, focusing on financial empowerment and smart shopping.',
                'popup_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'popup_content' => [
                    'Developed user onboarding copy that increased conversion by 40%',
                    'Created educational content about responsible spending',
                    'Wrote merchant partnership proposals and marketing materials',
                    'Crafted app store descriptions and promotional campaigns'
                ],
                'popup_additional_sections' => [
                    [
                        'title' => 'Key Metrics Achieved',
                        'items' => [
                            'User conversion rate improved from 12% to 40%',
                            'App store rating increased to 4.8/5 stars',
                            'Merchant onboarding increased by 200%',
                            'Customer support tickets reduced by 35%'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Al Ahram',
                'description' => 'Egypt\'s leading newspaper and media organization',
                'start_date' => '2019-03',
                'end_date' => '2022-08',
                'read_more' => 'Developed editorial guidelines and digital content strategy for Al Ahram\'s online presence, helping modernize their voice while maintaining their authoritative reputation.',
                'position' => 3,
                'is_active' => true,
                'popup_title' => 'Al Ahram - Egypt\'s Voice of Authority',
                'popup_description' => 'Editorial and marketing content for Egypt\'s most prestigious newspaper, maintaining journalistic integrity while driving digital engagement.',
                'popup_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'popup_content' => [
                    'Wrote digital subscription campaigns that boosted online readership',
                    'Created newsletter content with high engagement rates',
                    'Developed social media strategies for news distribution',
                    'Crafted advertorial content maintaining editorial standards'
                ],
                'popup_additional_sections' => [
                    [
                        'title' => 'Digital Transformation Results',
                        'items' => [
                            'Website traffic increased by 250% within 6 months',
                            'Social media engagement rate improved to 8.5%',
                            'Newsletter open rates reached 45% (industry avg: 22%)',
                            'Mobile app downloads increased by 400%'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'President Cheese',
                'description' => 'Premium dairy and cheese manufacturer',
                'start_date' => '2020-09',
                'end_date' => '2023-05',
                'read_more' => 'Crafted appetizing product descriptions and marketing copy that emphasized the artisanal quality and rich taste of President Cheese products.',
                'position' => 4,
                'is_active' => true,
                'popup_title' => 'President Cheese - Premium Quality',
                'popup_description' => 'Brand messaging and product marketing for President Cheese, emphasizing French heritage and premium quality in the Egyptian market.',
                'popup_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'popup_content' => [
                    'Developed product launch campaigns for new cheese varieties',
                    'Created recipe content and cooking inspiration materials',
                    'Wrote retail partnership presentations and trade materials',
                    'Crafted brand storytelling content highlighting French expertise'
                ],
                'popup_additional_sections' => [
                    [
                        'title' => 'Market Performance',
                        'items' => [
                            'Increased market share by 35% in premium cheese segment',
                            'Achieved 92% brand recognition among target demographics',
                            'Generated 150% ROI on marketing campaigns',
                            'Expanded distribution to 500+ retail locations'
                        ]
                    ]
                ]
            ],
            [
                'title' => 'Bird',
                'description' => 'Creative agency and design studio',
                'start_date' => '2021-01',
                'end_date' => '2024-01',
                'read_more' => 'Developed brand voice and creative content strategy for Bird agency, focusing on innovative design solutions and creative storytelling.',
                'position' => 5,
                'is_active' => true,
                'popup_title' => 'Bird - Innovative Solutions',
                'popup_description' => 'Technology and innovation-focused content for Bird, emphasizing cutting-edge solutions and forward-thinking approaches.',
                'popup_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'popup_content' => [
                    'Developed technical documentation and user guides',
                    'Created thought leadership content for industry publications',
                    'Wrote investor presentations and business proposals',
                    'Crafted product marketing materials for B2B audiences'
                ],
                'popup_additional_sections' => [
                    [
                        'title' => 'Innovation Impact',
                        'items' => [
                            'Secured $2.5M in Series A funding through compelling pitch decks',
                            'Increased B2B lead generation by 180%',
                            'Published 15+ thought leadership articles in tech publications',
                            'Achieved 95% client satisfaction in technical documentation'
                        ]
                    ]
                ]
            ],
            [
                'title' => '57357 Hospital',
                'description' => 'Leading pediatric cancer treatment center',
                'start_date' => '2020-03',
                'end_date' => '2023-09',
                'read_more' => 'Created compassionate and informative content for 57357 Hospital, helping families understand treatment options and supporting fundraising campaigns.',
                'position' => 6,
                'is_active' => true,
                'popup_title' => '57357 Hospital - Hope and Healing',
                'popup_description' => 'Compassionate and impactful content for Egypt\'s leading children\'s cancer hospital, focusing on hope, community support, and medical excellence.',
                'popup_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'popup_content' => [
                    'Created fundraising campaigns that increased donations by 60%',
                    'Developed patient story content with sensitivity and impact',
                    'Wrote grant applications and partnership proposals',
                    'Crafted awareness campaigns about childhood cancer prevention'
                ],
                'popup_additional_sections' => [
                    [
                        'title' => 'Impact & Results',
                        'items' => [
                            'Raised over $5M through targeted fundraising campaigns',
                            'Increased donor retention rate to 85%',
                            'Secured partnerships with 25+ international organizations',
                            'Achieved 98% patient family satisfaction in communication'
                        ]
                    ]
                ]
            ]
        ];

        foreach ($logos as $logo) {
            Logo::updateOrCreate(
                ['title' => $logo['title']],
                $logo
            );
        }
    }
}