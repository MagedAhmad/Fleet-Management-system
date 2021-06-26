<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

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
            'bus_id' => ['required', 'exists:buses,id'],
            'seat_id' => ['required', 'exists:seats,id'],
            'start_id' => ['required', 'exists:stations,id'],
            'end_id' => ['required', 'exists:stations,id'],
            'customer_id' => ['required', 'exists:customers,id'],
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
