<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => 'aaaaaa@gmail.com',
                'password' => '$2y$10$T91CZjaEM99zq7E80.FReOFcxV2ZrEH9a89c38Pp8aLLDGQG3Re5i'
            ],
            [
                'name' => 'exam',
                'email' => 'bbbbbb@gmail.com',
                'password' => '$2y$10$/DnkGlyIAahJrwuCmC9cyeiP1aTSCGboVVT9R.FoCkaJ5XtR73grC'
            ]
        ]);
    }
}
