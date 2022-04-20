<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'mobile' => ['required', 'string', new PhoneNumber()],
            "fill_name_ar" => ['required', 'string', 'max:50'],
            "fill_name_en" => ['required', 'string', 'max:50'],
            "birth_date" => ['required', 'date', 'before:now'],
            "gender" => ['required', 'string', 'in:0,1'],
            "whatsapp" => ['required', 'string', new PhoneNumber()],
            "quote" => ['required', 'string', 'max:50'],
            "Residence" => ['required', 'string', 'between:0,9'],
            "position" => ['required', 'string', 'in:0,1'],
            "food_allergy" => ['required', 'string', 'max:50'],
            "illnesses" => ['required', 'string', 'max:50'],
            "hotel_id" => ['required', 'string', 'exists:hotels,id'],
            "image" => ['required','image', 'mimes:jpg,png,jpeg,gif,svg|max:2048'],
            "id_image" => ['required','image', 'mimes:jpg,png,jpeg,gif,svg|max:2048'],
            "activities" => ['sometimes'],
            "activities.*" => ['sometimes', 'exists:activities,id']
        ];
    }
}
