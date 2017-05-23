<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use auctionTime\User;
use auctionTime\Product;
use auctionTime\Tag;


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

        //USERS
        for ($i=0; $i < 10; $i++)
        {
            factory(User::class)->create();
        }

        //PRODUCTS / TAGS
        for ($i=0; $i < 200; $i++)
        {
            $p = factory(Product::class)->create();
            $t = factory(Tag::class)->create();

            $p->tags()->attach($t);
        }


    }
}
