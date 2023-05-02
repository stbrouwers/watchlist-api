<?php

namespace Database\Seeders;

use App\Models\Identifier;
use App\Models\Watchlist;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Traits\WatchlistTrait;
use App\Models\Platform;


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
        $count = 100;
        $created_by = Identifier::all()->pluck('id');
        for($i = 0; $i<$count; $i++) {
            $this->newWatchlist($faker->word.$faker->word.' videos', false, false, $faker->randomElement($created_by));
        }

        //Platforms
        //
        //flags:
        //min (supported_length >=) : max (supported_length <=) : numbers (0-9) : low(ercase) : up(percase); (individual characters)
        //
        //example:
        //min:max:numbers:low:up;&*$@_

        $platforms = [
            ['name' => 'YouTube', 'base_url' => 'https://www.youtube.com/watch?v=', 'supported_length' => 11,  'supported_format' => 'min:max:numbers:low:up;-_'],
            ['name' => 'Vimeo', 'base_url' =>  'https://vimeo.com/', 'supported_length' => 10, 'supported_format' => 'max:numbers'],
            ['name' => 'Twitter', 'base_url' =>  'https://twitter.com/i/status/', 'supported_length' => 19, 'supported_format' => 'min:max:numbers'],
            ['name' => 'Crunchyroll', 'base_url' =>  'https://www.crunchyroll.com/watch/', 'supported_length' => 9, 'supported_format' => 'min:max:numbers:up'],
        ];

        foreach($platforms as $platform) {
            Platform::Create($platform);
        }
    }
}
