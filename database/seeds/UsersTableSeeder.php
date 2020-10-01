<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $faker = Faker\Factory::create('ja_JP');

        for($i=0; $i<10; $i++)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'remember_token' => Str::random(10),
            ]);
        }

        // DB::table('users')->insert([
        //     [
        //         'name' => 'test',
        //         'email' => 'aaaaaa@gmail.com',
        //         'password' => '$2y$10$T91CZjaEM99zq7E80.FReOFcxV2ZrEH9a89c38Pp8aLLDGQG3Re5i'
        //     ],
        //     [
        //         'name' => 'exam',
        //         'email' => 'bbbbbb@gmail.com',
        //         'password' => '$2y$10$/DnkGlyIAahJrwuCmC9cyeiP1aTSCGboVVT9R.FoCkaJ5XtR73grC'
        //     ]
        // ]);
    }
}
