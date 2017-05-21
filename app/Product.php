<?php

namespace auctionTime;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'duration',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'duration',
        'created_at',
        'updated_at'
    ];

    public function scopeIncomplete($query)
    {
        return $query->where('active', 0);
    }

    public function findById($id)
    {
        return Product::findOrFail($id);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addRating($grade, $comment, $id)
    {
        $this->ratings()->create(['grade' => $grade, 'comment' => $comment, 'user_id' => $id]);
    }


}
