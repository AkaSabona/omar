<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::create([
            'projects_count' => '150+',
            'avg_increase' => '86%',
            'years_experience' => '6+',
            'profile_name' => 'Omar Gamal',
            'profile_title' => 'Senior Copywriter',
            'profile_skills' => ['Web Copy', 'Email Marketing', 'Content Strategy']
        ]);
    }
}
