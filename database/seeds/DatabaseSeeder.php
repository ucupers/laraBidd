<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        //PRODUCTS

        DB::table('products')->insert([
            'user_id' => 1,
            'title' => 'Pomme',
            'description' => 'La belle pomme !',
            'imgUrl' => 'https://4.bp.blogspot.com/-JFud0TuYv2Y/VpdkV9WyKFI/AAAAAAAAAPM/GZZcbVk-Alk/s1600/froots.jpg',
            'minBid' => random_int(1,5),
            'instantPurchasePrice' => random_int(10,100),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

        DB::table('products')->insert([
            'user_id' => 1,
            'title' => 'Cerise',
            'description' => 'La belle cerise !',
            'imgUrl' => 'http://2.bp.blogspot.com/-95J0nKADZnw/VL6Bquou8LI/AAAAAAAAG7U/Pq3iYpvG574/s1600/makanan-rahasia-awet-muda%2B(4).jpg',
            'minBid' => random_int(1,5),
            'instantPurchasePrice' => random_int(10,100),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

        DB::table('products')->insert([
            'user_id' => 1,
            'title' => 'Poire',
            'description' => 'La belle poire !',
            'imgUrl' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnmawlitdA3Y9CKdHC9LM02hHboFmlpvFgXrY1hqePUSLedw2o',
            'minBid' => random_int(1,5),
            'instantPurchasePrice' => random_int(10,100),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

        DB::table('products')->insert([
            'user_id' => 1,
            'title' => 'Fraise',
            'description' => 'La belle fraise !',
            'imgUrl' => 'http://99sudbury.ca/GYM%20IMAGES/Karin%20feb%20131560706036Fruits_Wallpapers__04.jpg',
            'minBid' => random_int(1,5),
            'instantPurchasePrice' => random_int(10,100),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);


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
