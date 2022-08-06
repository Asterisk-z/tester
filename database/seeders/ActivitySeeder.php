<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Factory::create();
        $user = User::where('id', 1)->first();

        foreach(range(1, 100) as $index){
            $user->activities()->create([
                'title' => $faker->text(10),
                'description' =>  $faker->text(),
                'image' =>  $faker->imageUrl(),
                'interval' => random_int(1,5),
                'date' =>  now()->addDays(random_int(1,30)),
                'type' => "global",
            ]);
        }
        // $user->activities()->factory(1)->create();

    }
}
