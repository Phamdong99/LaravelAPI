<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Huy',
                'email' => 'huy123@gmail.com',
                'password' => '123',
                'address' => 'Hà Nội',
                'age' => '23',
                'phone' => '01698675733']
        ];
        foreach ($users as $user){
            DB::table('users')->insert($user);
        }
    }
}
