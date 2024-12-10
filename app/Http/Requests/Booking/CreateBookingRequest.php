<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "user_id" => ['required'],
            "check_in" => ['required'],
            "check_out" => ['required'],
            "room_type_id" => ['required'],
            "total_amount" => ['required'],
            "total_room" => ['required'],
            "total_guest" => ['required'],
            "total_child" => ['required'],
            "is_breakfast" => ['required'],
        ];
    }
}
