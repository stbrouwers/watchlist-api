<?php

namespace Database\Seeders;

use App\Models\Identifier;
use Faker\Provider\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class IdentifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $count = 20;
        Identifier::create(['id' => '00000000-0000-0000-0000-000000000000','reference' => 'test', 'is_watchlist' => false]);

        for($i = 0; $i<$count; $i++) {
            $data = ['id' => Str::uuid(),'reference' => $faker->firstName(), 'is_watchlist' => false];
            Identifier::create($data);
        }
    }
}
