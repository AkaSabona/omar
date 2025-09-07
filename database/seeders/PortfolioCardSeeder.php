<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PortfolioCard;

class PortfolioCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portfolioCards = [
            [
                'title' => 'Energizer',
                'description' => 'Dynamic content strategy for the global battery brand.',
                'background_class' => 'energizer-bg',
                'position' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Tamara',
                'description' => 'Strategic copy for the leading Buy Now, Pay Later platform in the MENA region.',
                'background_class' => 'tamara-bg',
                'position' => 2,
                'is_active' => true
            ],
            [
                'title' => '57357 Hospital',
                'description' => 'Compelling content creation for Egypt\'s leading children\'s cancer hospital campaigns.',
                'background_class' => 'hospital-bg',
                'position' => 3,
                'is_active' => true
            ],
            [
                'title' => 'Shawarmer',
                'description' => 'Complete brand messaging and digital content strategy for the popular Middle Eastern food chain.',
                'background_class' => 'shawarmer-bg',
                'position' => 4,
                'is_active' => true
            ],
            [
                'title' => 'Egyptian Exchange',
                'description' => 'Compelling content creation for Egypt\'s leading financial institution.',
                'background_class' => 'egyptian-exchange-bg',
                'position' => 5,
                'is_active' => true
            ]
        ];
        
        foreach ($portfolioCards as $card) {
            PortfolioCard::create($card);
        }
    }
}
