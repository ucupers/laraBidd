<?php

namespace auctionTime\Http\Controllers;

use Illuminate\Http\Request;
use auctionTime\Product;
use auctionTime\Rating;

class RatingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Product $product)
    {
        $product->addRating(request('grade'), request('comment'), auth()->id());
        return back();
    }
}
