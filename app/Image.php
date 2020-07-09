<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\listing;

class Image extends Model
{
    protected $guarded = [];

    public function listing()
    {
        return $this->belongsTo('App\Listing');
    }
}
