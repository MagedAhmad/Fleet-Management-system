<?php

namespace App\Http\Requests;

use Composer\DependencyResolver\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Accounts\WithHashedPassword;
use Astrotomic\Translatable\Validation\RuleFactory;

class ProfileRequest extends FormRequest
{
    use WithHashedPassword;

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
        return RuleFactory::make(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email,' . $this->route('user')],
                'phone' => ['required', 'unique:users,phone,' . $this->route('user')],
                'password' => ['nullable', 'min:8', 'confirmed'],
                'show_email' => ['sometimes'],
                'show_phone' => ['sometimes'],
                'active_chat' => ['sometimes'],
            ]
        );
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make(trans('specializations.attributes'));
    }
}
