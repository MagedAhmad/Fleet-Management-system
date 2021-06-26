<?php

namespace App\Http\Requests\Api;

use App\Models\User;
use App\Rules\PasswordRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Accounts\WithHashedPassword;

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
            'bus_id' => ['required', 'exists:trips,id'],
            'start_id' => ['required', 'exists:stations,id'],
            'end_id' => ['required', 'exists:stations,id'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('bookings.attributes');
    }
}
