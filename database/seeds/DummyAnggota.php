<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\Anggota;
use App\User;

class DummyAnggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $a=array("Anggota Kehormatan","Anggota Penuh","Anggota Istimewa","Anggota Muda");

        for ($i=0; $i < 99; $i++) {

            $user = User::create([
                'nia'       =>  $faker->numerify('test-###-##'),
                'name'      =>  $faker->userName,
                'level'     =>  'anggota',
                'email'     =>  $faker->email,
                'password'  =>  bcrypt('12345'),
            ]);

            $anggota = new Anggota();
            $anggota->nama = $faker->name;
            $anggota->angkatan = '2016';
            $anggota->jurusan = 'SK';
            $anggota->alamat = $faker->streetAddress;
            $anggota->no_telp = $faker->phoneNumber;
            $anggota->ket = $faker->text($maxNbChars = 200);
            $anggota->category = $a[rand(0,3)];
            $anggota->user_id = $user->id;
            $anggota->save();

        }
    }
}
