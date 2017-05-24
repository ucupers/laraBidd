<?php

namespace auctionTime;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'amount',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //USER RELATIONSHIPS
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
