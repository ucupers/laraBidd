<?php

namespace auctionTime\Http\Controllers;

use auctionTime\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    //Display all products
    public function index()
    {

        $products = DB::table('products')->get();

        return view('welcome', compact('products'));
    }

    //Show ONE product
    public function show(Product $product)
    {

        return view('products.single', compact('product'));
    }

    //Create product
    public function create()
    {
        return view('products.create');
    }

    //Store product
    public function store()
    {

        $this->validate(request(), [
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:255',
            'imgUrl' => 'required|string|min:3|max:255',
            'minBid' => 'required|numeric',
            'instantPurchasePrice' => 'numeric',
            'active' => 'boolean',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date'
        ]);

        Product::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'description' => request('description'),
            'imgUrl' => request('imgUrl'),
            'minBid' => request('minBid'),
            'instantPurchasePrice' => request('instantPurchasePrice'),
            'active' => request('active'),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

        return view('products.response');
    }

    public function edit(Product $product)
    {
    }

    public function delete(Product $product)
    {
    }

}
