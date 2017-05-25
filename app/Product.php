<?php

namespace auctionTime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'imgUrl',
        'minBid',
        'instantPurchasePrice',
        'active',
    ];

    protected $dates = [
        'duration',
        'created_at',
        'updated_at'
    ];


    //GET ACTIVE RECORDS
    public function scopeIncomplete($query)
    {
        return $query->where('active', 0);
    }

    //GET UNCOMPLETED PRODUCTS
    public static function activeLastProducts()
    {
        return Product::latest()
            ->where('active', 1)
            ->whereDate('duration', '>', Carbon::today()->toDateString())
            ->orderBy('duration', 'ASC')
            ->get();
    }

    //GET PRODUCT BY ID
    public function findById($id)
    {
        return Product::findOrFail($id);
    }

    //GET BY SEARCHBOX
    public static function searchBox($query)
    {
        $p = Product::where('active', 1)
            ->whereDate('duration', '>', Carbon::today()->toDateString())
            ->orderBy('duration', 'ASC')
            ->where('title', 'like', '%' . $query . '%')
            ->get();


        if(empty($p))
        {
            $p="No data found";
        }

        return $p;
    }


    //RATINGS RELATIONSHIPS
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function addRating($grade, $comment, $id)
    {
        $this->ratings()->create(['grade' => $grade, 'comment' => $comment, 'user_id' => $id]);
    }


    //BIDS RELATIONSHIPS
    public static function lastBid()
    {
        return Bid::orderBy('created_at', 'desc')->first();
    }

    public function addBid($amount, $id)
    {
        if (!empty(Bid::orderBy('created_at', 'DESC')->where('product_id', '=', $this->id)->first()->amount)) {
            $b = Bid::orderBy('created_at', 'DESC')->where('product_id', '=', $this->id)->first()->amount;
        } else {
            $b = 0;
        }
        $this->bids()->create(['amount' => $amount + $b, 'user_id' => $id]);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class)->orderBy('created_at', 'DESC')->take(7);
    }


    //USER RELATIONSHIPS
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    //TAGS RELATIONSHIPS
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
