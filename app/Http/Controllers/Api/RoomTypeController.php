<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function search(Request $request) {
        try {
            $perPage = $request->get('per_page', 10);

            $roomType = RoomType::query();

            // Check and apply filters dynamically
            $roomType->when($request->filled('name'), function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('name') . '%');
            });

            $roomType->when($request->filled('capacity'), function ($q) use ($request) {
                $q->whereRaw('capacity * number_of_room >= ?', (int)$request->input('capacity'));
            });

            // Execute roomType and paginate results
            $results = $roomType->with('amenities')->with('images')->paginate($perPage);

        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage(),
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
        return response()->json([
            'message' => 'success',
            'data' => $results->items(),
            'meta' => [
                'current_page' => $results->currentPage(),
                'last_page' => $results->lastPage(),
                'per_page' => $results->perPage(),
                'total' => $results->total(),
            ]
        ], JsonResponse::HTTP_OK);
    }

    public function detail($id) {
        try {
            $room = RoomType::with('amenities')->with('images')->find($id);
        } catch (\Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'success',
            'data' => $room,
        ], JsonResponse::HTTP_OK);
    }
}
