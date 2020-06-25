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

        for ($i = 0; $i < 10; $i++) {
            $administrator = new \App\User;
            $administrator->username = "admin{$i}";
            $administrator->name = "Administrator{$i}";
            $administrator->email = "admin{$i}@gmail.com";
            $administrator->roles = json_encode(["ADMIN"]);
            $administrator->password = \Hash::make("123456");
            $administrator->avatar = "foto-profil{$i}.png";
            $administrator->address = "{$i}, Tangerang Selatan";
            $administrator->phone = "08138550554{$i}";

            $administrator->save();
        }


        $this->command->info("User berhasil diseed ke DB");
    }
}
