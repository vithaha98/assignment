<?php
use App\Models\posts;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1, 20) as $value) {
            \App\Models\posts::create([
                'title' => $faker->text('20'),
                'content' => $faker->text('200'),
                'user_id'=> \App\Models\Users::inRandomOrder()->first()->id,
                'cate_id'=> \App\Models\Catogery::inRandomOrder()->first()->id
            ]);

        }
    }
}
