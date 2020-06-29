<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = "absensis";

    public function karyawan()
    {
        return $this->belongsTo('App\Karyawan');
    }
}
