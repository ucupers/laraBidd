<?php

namespace auctionTime\Http\Controllers;

use Illuminate\Http\Request;
use auctionTime\Product;

class BidsController extends Controller
{
    public function store(Product $product)
    {
        $product->addBid(request('amount'), auth()->id());
        return back();
    }
}
