<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $roomTypes = RoomType::all();
        return view('frontend.index', compact('roomTypes'));
    }
}
