<?php

namespace Database\Seeders;

use App\Models\Identifier;
use Faker\Provider\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Traits\IdentifierTrait;

class IdentifierSeeder extends Seeder
{
    use IdentifierTrait;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $count = 30;

        //for testing
        Identifier::create(['id' => '00000000-0000-0000-0000-000000000000','reference' => 'test', 'is_watchlist' => false]);

        for($i = 0; $i<$count; $i++) {
            $this->newIdentifier($faker->firstName() . ' ' . $faker->firstName() . ' ' . $faker->lastName(), false);
        }
    }
}
