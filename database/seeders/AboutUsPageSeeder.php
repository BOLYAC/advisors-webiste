<?php

namespace Database\Seeders;

use App\Models\AboutUsPage;
use Illuminate\Database\Seeder;

class AboutUsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUsPage::create([
            'status' => 1,
        ]);
    }
}
