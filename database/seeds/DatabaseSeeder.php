<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use auctionTime\User;
use auctionTime\Product;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //USERS

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('powpow'),
        ]);

        //PRODUCTS
        for ($i=0; $i < 10; $i++)
        {
            factory(Product::class)->create();
        }

    }
}
