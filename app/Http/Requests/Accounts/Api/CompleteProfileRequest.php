<?php

namespace App\Http\Requests\Accounts\Api;

use App\Models\User;
use App\Rules\PasswordRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Accounts\WithHashedPassword;

class CompleteProfileRequest extends FormRequest
{
    use WithHashedPassword;

    /**
     * Determine if the supervisor is authorized to make this request.
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
            'name' => ['required', 'required', 'string', 'max:255'],
            'email' => ['required', 'required', 'email', 'unique:users,email,' . auth()->id()],
            'phone' => ['required', 'required', 'unique:users,phone,' . auth()->id()],
            'country_id' => ['required', 'nullable', 'exists:countries,id'],
            'city_id' => ['required', 'nullable', 'exists:cities,id'],
            'area_id' => ['required', 'nullable', 'exists:areas,id'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('doctors.attributes');
    }
}
