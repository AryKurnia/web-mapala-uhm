<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    protected $table = 'identitas';
    protected $fillable = ['identitas'];

    public function atribut()
    {
        return $this->belongsToMany('App\Model\Admin\Anggota', 'identitas_anggota', 'identitas_id', 'anggota_id');
    }
}
