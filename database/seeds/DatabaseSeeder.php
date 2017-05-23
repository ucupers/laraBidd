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
        for ($i=0; $i < 50; $i++)
        {
            factory(User::class)->create();
        }

        //PRODUCTS // TAGS
        for($i=0; $i < 5; $i++)
        {
            $t = factory(Tag::class)->create();
            $u = factory(Tag::class)->create();
            $v = factory(Tag::class)->create();

            for($k=0; $k <10; $k++){
                $p = factory(Product::class)->create();
                $p->tags()->attach($t);
                $p->tags()->attach($u);
                $p->tags()->attach($v);
            }
        };


    }
}
