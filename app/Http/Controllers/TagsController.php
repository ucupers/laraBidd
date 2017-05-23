<?php

namespace auctionTime\Http\Controllers;

use Illuminate\Http\Request;
use auctionTime\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $products = $tag->products;
        if (count($products)>0){
            return view('welcome', compact('products'));
        } else {
            return redirect()->route('productsIndex');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|unique:tags|max:255',
        ]);

        $tag = [
            'name' => $request->name,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ];

        Tag::create($tag);


        return back();
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
    }
}
