<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'image' => 'backend/img/default.jpg',
            'name' => 'super_admin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('123456'),
        ]);

        $user->attachRole('super_admin');
    }
}
