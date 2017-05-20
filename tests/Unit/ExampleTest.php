<?php

namespace Tests\Unit;

use auctionTime\User;
use Faker\Provider\DateTime;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use auctionTime\Product;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        $user_one = factory(User::class)->create([
            'id' => 1
        ]);
        $user_two = factory(User::class)->create([
            'id' => 2
        ]);
        $user_tree = factory(User::class)->create([
            'id' => 3
        ]);

        $first = factory(Product::class)->create([
            'user_id' => 1
        ]);
        $second = factory(Product::class)->create([
            'user_id' => 1
        ]);
        $third = factory(Product::class)->create([
            'user_id' => 2
        ]);

        $topsellers = User::bestUsers();
        dd($topsellers);

    }
}
