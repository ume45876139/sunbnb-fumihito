<?php

namespace App\Http\Controllers\Host;

use App\User;
use App\Image;
use App\Listing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Geocoder\Facades\Geocoder;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    public function createRoom()
    {
        return view('sunbnb/listing/createroom');
    }

    public function listing(Listing $listing)
    {
        return view('sunbnb/listing/listing', compact('listing'));
    }

    public function pricing(Listing $listing)
    {
        return view('sunbnb/listing/pricing', compact('listing'));
    }

    public function description(Listing $listing)
    {
        return view('sunbnb/listing/description', compact('listing'));
    }

    public function photo(Listing $listing)
    {
        $images = Image::where('listing_id', $listing->id)->get();

        $profImg = User::find(1)->gravatar();

        return view('sunbnb/listing/photo', compact('images','listing', 'profImg'));
    }

    public function amenities(Listing $listing)
    {
        return view('sunbnb/listing/amenities', compact('listing'));
    }

    public function location(Listing $listing)
    {
        return view('sunbnb/listing/location', compact('listing'));
    }

    // below store functions
    public function storeRoom(Request $request, Listing $listing)
    {
        if($request->hometype == 'Select...' || 
        $request->roomtype == 'Select...' || 
        $request->accomodate == 'Select...' || 
        $request->bedroom == 'Select...' || 
        $request->bathroom == 'Select...')
        {
            toastr()->error('No entered some infomation');

            return back();
        } else {
            $listing->storeListing($request->hometype, $request->roomtype, $request->accomodate, $request->bedroom, $request->bathroom);

            toastr()->success('Successfully saved!');
            
            return redirect()->route('listing',['listing' => $listing]);
        }
    }

    public function updateRoom(Request $request, Listing $listing)
    {
        if($request->hometype == 'Select...' || 
        $request->roomtype == 'Select...' || 
        $request->accomodate == 'Select...' || 
        $request->bedroom == 'Select...' || 
        $request->bathroom == 'Select...')
        {   
            toastr()->error('No entered some infomation');

            return back();
        } else {
            $listing->storeListing($request->hometype, $request->roomtype, $request->accomodate, $request->bedroom, $request->bathroom);
            toastr()->success('Successfully saved!');

            return redirect()->route('pricing', ['listing' => $listing]);
        }
    }

    public function storePrice(Request $request, Listing $listing)
    {
        if($request->price === null)
        {
            toastr()->error('No entered price');

            return back();
        } else {$listing->storeValue($request->price);
            toastr()->success('Successfully saved!');

            return redirect()->route('description', ['listing' => $listing]);
        }
    }

    public function storeDescription(Request $request, Listing $listing)
    {
        if($request->name === null || $request->description === null)
        {
            $listing->storeDetail($request->name, $request->description);
            toastr()->error('No entered some infomation');

            return back();
        } else {
            toastr()->success('Successfully saved!');

            return redirect()->route('photo', ['listing' => $listing]);
        }
    }

    public function storePhoto(Request $request, Listing $listing)
    {
        toastr()->success('Successfully saved!');

        return redirect()->route('amenities', ['listing' => $listing]);
    }

    public function storeAmenities(Request $request, Listing $listing)
    {
        $listing->storeAmenities($request->tv, $request->kitchen, $request->internet, $request->heating, $request->aircondition);
        toastr()->success('Successfully saved!');

        return redirect()->route('location', ['listing' => $listing]);
    }
    
    public function upload(Request $request, Listing $listing)
    {
        foreach ($request->file('photo') as $photo) {
            // Save to Folder
            $filename = $photo->getClientOriginalName();
            $path = $photo->storeAs("public/photos", $filename);
            $publicPath = Storage::url($path);

            Image::create([
                 //add listing_id
                'listing_id' => $listing->id,
                'file_location' => $publicPath,
            ]);
        }

        return response()->json(['success']);
    }


    public function storeLocation(Request $request, Listing $listing)
    {
        if($request->location === null)
        {
            toastr()->error('No entered some infomation');

            return back();
        } else {
            $listing->storeAddress($request->location);

            //save geocode
            $geocode = Geocoder::getCoordinatesForAddress($request->location);
            $listing->storeGeocode($geocode['lat'], $geocode['lng']);

            //save city
            $geocode = Geocoder::getAddressForCoordinates($listing->latitude, $listing->longitude);

            foreach($geocode['address_components'] as $key => $components)
            {
                if(in_array("locality",$components->types))
                {
                    $city = $components->long_name;
                    $listing->storeCity($city);

                    break;
                }
            }
            toastr()->success('Successfully saved!');

            return back();
        }
    }

    public function publish(Request $request, Listing $listing)
    {
        $listing->isPublished($request->is_published);
        toastr()->success('Successfully published!');

        return back();
    }
}
