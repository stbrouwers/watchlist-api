<?php

namespace Database\Seeders;

use App\Models\Watchlist;
use Illuminate\Database\Seeder;

class WatchlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sample_data = [
            ['kaas videos', false, false]
        ];

        foreach($sample_data as $data) {
            Watchlist::create($data);
        }
    }
}
