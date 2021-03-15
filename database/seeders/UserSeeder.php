<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Candra";
        $user->email = "candraherdiansyah14@gmail.com";
        $user->password = bcrypt('12345678');
        $user->role = "Admin";
        $user->save();

        $user = new User();
        $user->name = "Petugas";
        $user->email = "petugas@gmail.com";
        $user->password = bcrypt('12345678');
        $user->role = "Petugas";
        $user->save();

    }
}
