<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FeaturedClientWork;

class FeaturedClientWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FeaturedClientWork::create([
            'title' => 'Featured Client Work',
            'subtitle' => 'Real projects, real results. See how strategic copywriting transformed these brands.',
            'position' => 1
        ]);
    }
}
