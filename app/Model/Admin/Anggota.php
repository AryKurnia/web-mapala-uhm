<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = ['nama','angkatan','jurusan','alamat','no_telp','ket','category','user_id','image'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function atribut()
    {
        return $this->belongsToMany('App\Model\Admin\Identitas', 'identitas_anggota', 'anggota_id', 'identitas_id')->withTimestamps();
    }
}
