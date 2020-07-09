<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;


class FilterController extends Controller
{
    public function filter(Request $request, Listing $listing)
    {
        $validatedData = $request->validate([
            'min_price' => 'integer',
            'max_price' => 'integer',
        ]);

        //perfect search query !!
        $minPrice = $request->min_price;
        $maxPrice = $request->max_price;
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $roomType = $request->roomtype;
        $accomodate = $request->accomodate;
        $bedRoom = $request->bedroom;
        $bathRoom = $request->bathroom;
        $tv = $request->tv;
        $kitchen = $request->kitchen;
        $internet = $request->internet;
        $heating = $request->heating;
        $airCondition = $request->aircondition;

        if ($request->all() > 0) {
            $listings = Listing::when($minPrice !== null && $maxPrice !== null, function ($query, $minPrice) {
                return $query->whereBetween('price', [$request->min_price, $request->max_price]);
            })
                ->when($startDate !== null && $endDate !== null, function ($query, $startDate){$listing->reservations->whereNotBetween('date', [$startDate, $endDate]);
                })
                ->when($roomType, function ($query, $roomType){
                    return $query->where('roomtype', $roomType);
                })
                ->when($accomodate, function ($query, $accomodate){
                    return $query->where('accomodate', $accomodate);
                })
                ->when($bedRoom, function ($query, $bedRoom){
                    return $query->where('bedroom', $bedRoom);
                })
                ->when($bathRoom, function ($query, $bathRoom){
                    return $query->where('bathroom', $bathRoom);
                })
                ->when($tv, function ($query, $tv){
                    return $query->where('tv', $tv);
                })
                ->when($kitchen, function ($query, $kitchen){
                    return $query->where('kitchen', $kitchen);
                })
                ->when($internet, function ($query, $internet){
                    return $query->where('internet', $internet);
                })
                ->when($heating, function ($query, $heating){
                    return $query->where('heating', $heating);
                })
                ->when($airCondition, function ($query, $airCondition){
                    return $query->where('aircondition', $airCondition);
                })
                ->get();
            return view('sunbnb/search', compact('listings'));
        } else {
            $listings = Listing::all();

            return view('sunbnb/search', compact('listings'));
        }
    }
}
