<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $website1 = Website::create([
            'name'=>'Stack Overflow'
        ]);

        $website2 = Website::create([
            'name'=>'Quora'
        ]);

        $website2 = Website::create([
            'name'=>'Reddit'
        ]);
    }
}
