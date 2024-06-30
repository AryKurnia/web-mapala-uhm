<?php

use Illuminate\Database\Seeder;
use App\Model\Landing\Berita;

class BeritasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 30; $i++) {

            $berita = new Berita();
            $berita->title = $faker->realText(30, 1);
            $berita->description = $faker->text;
            $berita->image = $faker->imageUrl(800, 600, 'cats');
            $berita->save();
        }
    }
}
