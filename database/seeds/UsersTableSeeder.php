<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Admin\Anggota;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nia'       =>  '2020-04-01',
            'name'      =>  'Super Admin',
            'level'     =>  'admin',
            'email'     =>  'admin@mail.com',
            'password'  =>  bcrypt(12345),
        ]);

        $anggota = new Anggota();
        $anggota->nama = 'Admin';
        $anggota->angkatan = '2016';
        $anggota->jurusan = 'SK';
        $anggota->alamat = 'Abdesir';
        $anggota->no_telp = '08953462';
        $anggota->ket = 'akun admin dapat berubah kepemilikan sesuai dengan aturan yang berlaku';
        $anggota->category = 'Pendiri';
        $anggota->user_id = $user->id;
        $anggota->save();
    }
}
