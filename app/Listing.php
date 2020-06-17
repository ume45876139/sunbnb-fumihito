<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reservation;
use Auth;
use App\Image;

class Listing extends Model
{
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function storeListing($hometype, $room_type, $accomodate, $bedroom, $bathroom)
    {
        $this->user_id = Auth::id();
        $this->hometype = $hometype;
        $this->roomtype = $room_type;
        $this->accomodate = $accomodate;
        $this->bedroom = $bedroom;
        $this->bathroom = $bathroom;
        $this->save();

        return $this;
    }

    public function storeValue($price)
    {
        $this->price = $price;
        $this->save();

        return $this;
    }

    public function storeDetail($name, $description)
    {
        $this->name = $name;
        $this->summary = $description;
        $this->save();

        return $this;
    }

    public function storePicture()
    {
        
    }

    public function storeAmenities($tv, $internet, $heating, $aircondition, $kitchen)
    {
        $this->tv = $tv;
        $this->internet = $internet;
        $this->heating = $heating;
        $this->aircondition = $aircondition;
        $this->kitchen = $kitchen;
        $this->save();
        
        return $this;
    }

    public function storeAddress($address)
    {
        $this->address = $address;
        $this->save();

        return $this;
    }

    public function storeGeocode($latitude,$longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->save();

        return $this;
    }

    public function isPublished($isPublished)
    {
        $this->is_published = $isPublished;
        $this->save();

        return $this;
    }
}
