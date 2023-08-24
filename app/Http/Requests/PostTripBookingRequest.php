<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostTripBookingRequest extends FormRequest
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
            'name'=>'required',
            'persons'=>'required',
            'email'=>'required|email',
            // 'subject'=>'required',
            'phone'=>'required',
            // 'address'=>'required',
            'country'=>'required',
            // 'departure_date'=>'required',
            'trip_name'=>'required',
            // 'trip_code'=>'required',
            // 'g-recaptcha-response'=>'required'
        ];
    }
}
