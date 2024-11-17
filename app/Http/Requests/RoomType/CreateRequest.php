<?php

namespace App\Http\Requests\RoomType;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => ['required'],
            'price' => ['required'],
            'capacity' => ['required'],
            'description' => ['required'],
            'number_of_room' => ['required'],
            'size' => ['required'],
            'discount' => ['required'],
            'bed_type' => ['required'],
            'view' => ['required'],
            'main_image' => ['required']
        ];
    }
}
