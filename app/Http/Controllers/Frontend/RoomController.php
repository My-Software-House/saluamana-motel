<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ImageRoomType;
use App\Models\RoomType;

class RoomController extends Controller
{
    public function index() {
        $roomTypes = RoomType::all();
        return view('frontend.rooms.index', compact('roomTypes'));
    }

    public function detail($name){
        $roomType = RoomType::where("name",$name)->first();
        $imgRoomType = ImageRoomType::where('room_type_id', $roomType->id)->get();

        return view('frontend.rooms.detail', compact('roomType', 'imgRoomType'));
    }
}
