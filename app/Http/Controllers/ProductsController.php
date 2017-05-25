<?php

namespace auctionTime\Http\Controllers;

use auctionTime\Http\Requests\CreateProductRequest;
use auctionTime\Http\Requests\UpdateProductRequest;
use auctionTime\Http\Requests\SearchBoxRequest;
use auctionTime\Product;
use auctionTime\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProductsController extends Controller
{
    //DISPLAY ACTIVE
    public function index()
    {
        $products = Product::activeLastProducts();
        return view('welcome', compact('products'));
    }

    //SHOW ONE
    public function show(Product $product)
    {
        return view('products.single', compact('product'));
    }

    //CREATE
    public function create()
    {
        $tags = \auctionTime\Tag::all();
        return view('products.create', compact('tags'));
    }

    //STORE
    public function store(CreateProductRequest $request)
    {
        $duration = Carbon::now();
        //$duration->add(new \DateInterval('P'.$request->duration.'D'));

        $product = [
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'imgUrl' => $request->imgUrl,
            'minBid' => $request->minBid,
            'instantPurchasePrice' => $request->instantPurchasePrice,
            'duration' => new \DateTime(),
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

    //EDIT
    public function edit(Product $product)
    {
        if (Auth::user()->id != $product->user_id)
        {
            return redirect(route('productsIndex'));
        }

        return view('products.edit', compact('product'));
    }

    //UPDATE
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

    //DELETE
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

    public function search(SearchBoxRequest $request)
    {
        $products = Product::searchBox($request->q);
        $q = $request->q;
        return view('welcome', compact('products', 'q'));
    }

}
