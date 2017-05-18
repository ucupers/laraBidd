<?php

namespace auctionTime;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'imgUrl',
        'minBid',
        'instantPurchasePrice',
        'active',
        'created_at',
        'updated_at'
    ];

    public function scopeIncomplete($query)
    {
        return $query->where('active', 0);
    }

    public function ratings(){

        return $this->hasMany(Rating::class);
    }

    public function addRating($grade, $comment){
        //TODO USER ID !!!!!!!!!
        $this->ratings()->create(['grade'=> $grade, 'comment' => $comment, 'user_id' => '3']);
    }
}
