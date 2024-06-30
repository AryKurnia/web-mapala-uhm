<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    protected $fillable = ['jumlah','tahun', 'akhir'];

    public function users()
    {
        return $this->belongsToMany('App\User', 'iuran_detail', 'iuran_id', 'user_id')->withPivot('bayar','tanggal','id');
    }
}
