<?php

namespace Database\Seeders;

use App\Models\Identifier;
use App\Models\Watchlist;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Traits\WatchlistTrait;


class WatchlistSeeder extends Seeder
{
    use WatchlistTrait;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $count = 10;
        $created_by = Identifier::all()->pluck('id');
        for($i = 0; $i<$count; $i++) {
            $this->newWatchlist($faker->word.$faker->word.' videos', false, false, $faker->randomElement($created_by));
        }
    }
}
