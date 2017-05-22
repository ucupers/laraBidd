<?php

namespace auctionTime;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
