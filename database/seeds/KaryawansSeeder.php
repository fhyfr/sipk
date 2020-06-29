<?php

use Illuminate\Database\Seeder;
use \App\Karyawan;

class KaryawansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $karyawans = new \App\Karyawan;
        $karyawans->nik = "11170930000036";
        $karyawans->name = "Aira Alfiansah";
        $karyawans->jabatan = "Marketing";
        $karyawans->jk = "Laki-laki";
        $karyawans->agama = "Islam";
        $karyawans->telepon = "+62813-8550-5546";

        $karyawans->save();

        $this->command->info("Karyawan berhasil diseed ke DB");
    }
}
