<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'listing_id' => '1',
                'file_location' => '/storage/photos/a3bfe19d88f12df2fe13e955514c52fb_s.jpg'
            ],
            [
                'listing_id' => '1',
                'file_location' => '/storage/photos/f7771c6afc7cc32401286116a7eed6f0.jpg'
            ],
        ]);
    }
}
