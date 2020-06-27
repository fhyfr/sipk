<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->name = "Jack Ma";
        $administrator->email = "jack@gmail.com";
        $administrator->username = "jack";
        $administrator->password = \Hash::make("123456");
        $administrator->roles = "karyawan";

        $administrator->save();

        $this->command->info("User berhasil diseed ke DB");
    }
}
