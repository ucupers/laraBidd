<?php

namespace auctionTime\Http\Controllers;

use Illuminate\Http\Request;
use auctionTime\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $products = $tag->products;

        return view('welcome', compact('products'));
    }
}
