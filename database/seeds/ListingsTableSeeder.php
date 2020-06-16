<?php

use Illuminate\Database\Seeder;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('listings')->insert([
            [
            'user_id'=>'1',
            'name'=>'house1',
            'summary'=>'test house',
            'price'=>'100',
            'hometype'=>'apart',
            'roomtype'=>'shere',
            'address'=>'鹿児島県霧島市国分中央2丁目-7',
            'accomodate'=>4,
            'bedroom'=>4,
            'bathroom'=>1,
            'tv'=>1,
            'internet'=>1,
            'heating'=>1,
            'aircondition'=>1,
            'kitchen'=>1,
            'latitude'=>11.11,
            'longitude'=>11.11,
            ],
            [
            'user_id'=>'2',
            'name'=>'house2',
            'summary'=>'test house2',
            'price'=>'200',
            'hometype'=>'hotel',
            'roomtype'=>'private',
            'address'=>'鹿児島県霧島市1丁目-23',
            'accomodate'=>1,
            'bedroom'=>1,
            'bathroom'=>1,
            'tv'=>1,
            'internet'=>1,
            'heating'=>1,
            'aircondition'=>1,
            'kitchen'=>1,
            'latitude'=>11.112,
            'longitude'=>11.112,
            ]
        ]);
    }
}
