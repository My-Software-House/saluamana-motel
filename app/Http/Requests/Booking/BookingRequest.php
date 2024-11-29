<?php

namespace App\Http\Requests\Booking;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BookingRequest extends FormRequest
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
            "name" => ['required'],
            "check_in" => ['required'],
            "check_out" => ['required'],
            "room_type_id" => ['required'],
            "email" => ['required'],
            "phone" => ['required'],
            "total_amount" => ['required'],
            "total_room" => ['required'],
            "payment_method" => ['required'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            "error" => $validator->getMessageBag()
        ], 400));
    }
}
