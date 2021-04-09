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
        $user->name = 'Radit';
        $user->email = 'radit@email.com';
        $user->username = 'mdradityatama';
        $user->phone = '+62812345';
        $user->is_admin = true;
        $user->password = bcrypt('password0!');
        $user->save();

        $user = new User();
        $user->name = 'dimas';
        $user->email = 'dimas@email.com';
        $user->username = 'dimasradit';
        $user->phone = '+62812678';
        $user->password = bcrypt('password0!');
        $user->save();

        $user = new User();
        $user->name = 'tama';
        $user->email = 'tama@email.com';
        $user->username = 'tamasya';
        $user->phone = '+6281291011';
        $user->password = bcrypt('password0!');
        $user->save();
    }
}
