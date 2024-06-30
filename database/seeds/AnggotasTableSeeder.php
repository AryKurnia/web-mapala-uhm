<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\Identitas;

class AnggotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Identitas::create([
            'identitas' => 'KTA',
        ]);

        Identitas::create([
            'identitas' => 'Slayer Merah',
        ]);

        Identitas::create([
            'identitas' => 'Slayer Hijau',
        ]);

        Identitas::create([
            'identitas' => 'Slayer Kuning',
        ]);

        Identitas::create([
            'identitas' => 'Slayer Biru',
        ]);

        Identitas::create([
            'identitas' => 'PDH',
        ]);

        Identitas::create([
            'identitas' => 'PDL',
        ]);

        Identitas::create([
            'identitas' => 'NIA',
        ]);
    }
}
