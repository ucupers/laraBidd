<?php

namespace auctionTime\Http\Controllers;

use auctionTime\Product;
use auctionTime\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    //Display all products
    public function index()
    {
        $products = Product::latest()->get();

        $bestUsers = User::bestUsers();

        return view('welcome', compact('products', 'bestUsers'));
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
            'duration' => 'numeric|min:1|max:31',
            'active' => 'boolean',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date'
        ]);

        $duration = new \DateTime();
        $duration->add(new \DateInterval('P'.request('duration').'D'));

        $product = [
            'user_id' => auth()->id(),
            'title' => request('title'),
            'description' => request('description'),
            'imgUrl' => request('imgUrl'),
            'minBid' => request('minBid'),
            'instantPurchasePrice' => request('instantPurchasePrice'),
            'duration' => $duration,
            'active' => request('active'),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ];

        Product::create($product);

        return redirect()->route('productsShow', DB::getPdo()->lastInsertId());
    }

}
