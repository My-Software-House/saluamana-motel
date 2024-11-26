<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomType\CreateRequest;
use App\Http\Requests\RoomType\UpdateRequest;
use App\Models\Amenities;
use App\Models\ImageRoomType;
use App\Models\RoomType;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    use UploadTrait;

    public function index() {
        $roomTypes = RoomType::all();
        return view('backend.room-types.index',  compact('roomTypes'));
    }

    public function create() {
        return view('backend.room-types.create');
    }

    public function store(CreateRequest $request) {
        try {
            $main_image = $this->uploads($request->file('main_image'), "room-type/images");

            $image_url = asset('storage/' . $main_image);

            $roomType = new RoomType([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'capacity' => $request->input('capacity'),
                'description'=> $request->input('description'),
                'number_of_room' => $request->input('number_of_room'),
                'size' => $request->input('size'),
                'discount' => $request->input('discount'),
                'bed_type' => $request->input('bed_type'),
                'view' => $request->input('view'),
                'main_image' => $image_url
            ]);


            $roomType->save();


            toast('Berhasil menambah tipe kamar','success');

            return redirect()->route('backend.rooms-types.index');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'danger');
            return redirect()->back();
        }
    }

    public function edit($id) {
        $roomType = RoomType::find($id);

        return view('backend.room-types.edit', compact('roomType'));
    }

    public function update(UpdateRequest $request, $id) {
        try {
            $roomType = RoomType::find($id);
            $roomType->name = $request->input('name');
            $roomType->price = $request->input('price');
            $roomType->capacity = $request->input('capacity');
            $roomType->description= $request->input('description');
            $roomType->number_of_room = $request->input('number_of_room');
            $roomType->size = $request->input('size');
            $roomType->discount = $request->input('discount');
            $roomType->bed_type = $request->input('bed_type');
            $roomType->view = $request->input('view');

            if ($request->file('main_image') != null) {
                $main_image = $this->uploads($request->file('main_image'), "room-type/images");
                $image_url = asset('storage/' . $main_image);
                $roomType->main_image = $image_url;
            }
            $roomType->save();

            toast('Berhasil update tipe kamar','success');

            return redirect()->route('backend.rooms-types.index');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'danger');
            dd($e);
            return redirect()->back();
        }
    }

    public function detail($id) {
        $roomType = RoomType::find($id);
        return view('backend.room-types.detail', compact('roomType'));
    }


    public function createAmenity($id) {
        $roomType = RoomType::find($id);
        $amenities = Amenities::all();
        return view('backend.room-types.amenity', compact('roomType', 'amenities'));
    }

    public function storeAmenity($id, Request $request) {
        $roomType = RoomType::find($id);
        $roomType->amenities()->attach($request->input('amenity_id'), ['amenity_type' => $request->input('amenity_type')]);
        toast('Berhasil menambah fasilitas','success');
        return redirect()->route('backend.rooms-types.detail', ['id' => $roomType->id]);
    }

    public function images(string $id) {
        $roomType = RoomType::find($id);
        $imgRoomType = ImageRoomType::where('room_type_id', $roomType->id)->get();
        return view('backend.room-types.images', compact('roomType', 'imgRoomType'));
    }

    public function imagespost(Request $request){
        try {
            $image = $this->uploads($request->file('file'), "room-type/images");
            $image_url = asset('storage/' . $image);

            $imageRoomType = new ImageRoomType([
                'image' => $image_url,
                'room_type_id' => $request->room_type_id
            ]);
            $imageRoomType->save();

            toast('Berhasil menambah gambar','success');

            return response()->json(['success'=>true, 'image_id' => $imageRoomType->id]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambah data homestay ' . '['. $e->getMessage() .']');
        }
    }

    public function imagesdelete(Request $request){
        // try {
        //     $this->imghomestayService->destroy($request->input('filename'), $request->input('id_homestay'));
        //     return response()->json(['success'=>true]);
        // } catch (\Exception $e) {
        //     return response()->json(['success'=> $e->getMessage()]);
        //     Log::error($e->getMessage());
        // }
    }
}
