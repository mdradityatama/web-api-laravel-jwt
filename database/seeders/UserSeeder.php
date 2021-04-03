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
        $user->phone = '+6281284396884';
        $user->password = bcrypt('password0!');
        $user->save();
    }
}
