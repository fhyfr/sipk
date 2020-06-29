<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //tanda bahwa model Karyawan punya tabel di database dg nama tabel 'karyawan'
    protected $table = "karyawans";

    public function absensi()
    {
        //tanda bahwa tabel karyawan punya relasi One to One dg tabel absensi
        return $this->hasOne('App\Absensi');
    }
}
