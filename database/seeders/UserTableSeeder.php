<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>"Thiago Dionizio",
            'email'=>"thiago.o.dionizio@gmail.com",
            'password'=>bcrypt('1234')
        ]);
        User::factory()
            ->count(50)
            ->create();
    }
}
