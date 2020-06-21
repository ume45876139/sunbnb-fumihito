<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //order of seeding
        $this->call([
            UsersTableSeeder::class,
            ListingsTableSeeder::class,
            ImagesTableSeeder::class
        ]);
    }
}
