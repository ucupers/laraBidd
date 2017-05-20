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


        //RATINGS

        DB::table('ratings')->insert([
            'product_id' => 1,
            'user_id' => 1,
            'grade' => 3,
            'comment' => "Taste good !",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
        DB::table('ratings')->insert([
            'product_id' => 1,
            'user_id' => 1,
            'grade' => 1,
            'comment' => "Meh...",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);
        DB::table('ratings')->insert([
            'product_id' => 1,
            'user_id' => 1,
            'grade' => 5,
            'comment' => "Best taste ever !",
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

    }
}
