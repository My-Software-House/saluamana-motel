<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Amenities\CreateRequest;
use App\Models\Amenities;
use App\Models\AmenitiesType;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    public function index() {
        $amenities = Amenities::all();
        return view('backend.amenities.index', compact('amenities'));
    }

    public function store(CreateRequest $request) {
        $amenitiy = new Amenities();
        $amenitiy->name = $request->input('name');
        $amenitiy->icon = $request->input('icon');
        $amenitiy->save();

        toast('Berhasil menambah amenity','success');
        return redirect()->back();
    }
}
