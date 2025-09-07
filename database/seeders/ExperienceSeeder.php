<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing experiences
        Experience::truncate();

        // Create sample experiences
        Experience::create([
            'company_name' => 'Kijami',
            'position' => 'Copywriter Intern',
            'year' => '2018',
            'duration' => 'August 2018 - Oct 2018',
            'description' => 'Started my copywriting journey with creative content development',
            'logo_class' => 'bg-dark',
            'logo_text' => 'K',
            'is_clickable' => false,
            'order_position' => 1,
            'is_active' => true
        ]);

        Experience::create([
            'company_name' => 'Hive Analytics',
            'position' => 'Junior Copywriter',
            'year' => '2019',
            'duration' => 'Jan 2019 - Dec 2019',
            'description' => 'Developed analytical writing skills and data-driven content',
            'logo_class' => 'bg-warning',
            'logo_text' => 'H',
            'is_clickable' => false,
            'order_position' => 2,
            'is_active' => true
        ]);

        Experience::create([
            'company_name' => 'Birdmilk',
            'position' => 'Senior Copywriter',
            'year' => '2020',
            'duration' => 'Jan 2020 - Present',
            'description' => 'Leading creative campaigns and brand storytelling',
            'logo_class' => 'bg-primary',
            'logo_text' => 'B',
            'is_clickable' => true,
            'target_logos' => 'Energizer,President,Ahram',
            'order_position' => 3,
            'is_active' => true
        ]);

        Experience::create([
            'company_name' => 'Indigo Media',
            'position' => 'Creative Director',
            'year' => '2021',
            'duration' => 'Mar 2021 - Aug 2021',
            'description' => 'Directed creative strategies for major brand campaigns',
            'logo_class' => 'bg-info',
            'logo_text' => 'I',
            'is_clickable' => false,
            'order_position' => 4,
            'is_active' => true
        ]);

        Experience::create([
            'company_name' => 'O Communication Group',
            'position' => 'Brand Strategist',
            'year' => '2022',
            'duration' => 'Sep 2021 - Present',
            'description' => 'Developing comprehensive brand strategies and market positioning',
            'logo_class' => 'bg-success',
            'logo_text' => 'O',
            'is_clickable' => false,
            'order_position' => 5,
            'is_active' => true
        ]);

        // Add the user's example: Hanem, Al-aharam - Tamara
        Experience::create([
            'company_name' => 'Hanem, Al-aharam',
            'position' => 'Artwork Designer',
            'year' => '2023',
            'duration' => 'Jan 2023 - Jun 2023',
            'description' => 'Created artwork designs for Tamara project',
            'logo_class' => 'bg-secondary',
            'logo_text' => 'H',
            'is_clickable' => false,
            'order_position' => 6,
            'is_active' => true
        ]);
    }
}
