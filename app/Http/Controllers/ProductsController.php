<?php

namespace auctionTime\Http\Controllers;

use auctionTime\Http\Requests\CreateProductRequest;
use auctionTime\Http\Requests\UpdateProductRequest;
use auctionTime\Product;
use auctionTime\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProductsController extends Controller
{
    //Display all products
    public function index()
    {
        $products = Product::activeLastProducts();
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
        $tags = \auctionTime\Tag::all();
        return view('products.create', compact('tags'));
    }

    //Store product
    public function store(CreateProductRequest $request)
    {
        $duration = new \DateTime();
        $duration->add(new \DateInterval('P'.$request->duration.'D'));

        $product = [
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'imgUrl' => $request->imgUrl,
            'minBid' => $request->minBid,
            'instantPurchasePrice' => $request->instantPurchasePrice,
            'duration' => $duration,
            'active' => $request->active,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ];

        $p = Product::create($product);

        foreach ($request->tags as $tag)
        {
            $p->tags()->attach($tag);
        };

        return redirect()->route('productsShow', $p->id);
    }

    //Store product
    public function edit(Product $product)
    {
        if (Auth::user()->id != $product->user_id)
        {
            return redirect(route('productsIndex'));
        }

        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request)
    {
        $productId = $request->route('product');
        $product = Product::findOrFail($productId);

        if (Auth::user()->id != $product->user_id)
        {
            return redirect(route('productsIndex'));
        }


        $productId = $request->route('product');
        $product = Product::findOrFail($productId);

        $duration = new \DateTime();
        $duration->add(new \DateInterval('P'.request('duration').'D'));

        $input = [
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

        $product->fill($input)->save();

        return redirect()->route('productsShow', $productId);
    }

    public function delete(Request $request)
    {
        $productId = $request->route('product');
        $product = Product::findOrFail($productId);

        if (Auth::user()->id != $product->user_id)
        {
            return redirect(route('productsIndex'));
        }

        $product->delete();

        return redirect(route('usersShow', Auth::user()->id ));
    }

}
