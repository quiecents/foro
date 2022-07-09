<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateUserRequest extends FormRequest
{
    // protected $redirect = '/admin/users';

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
            'name' => 'required|min:3|max:150',
            'email' => 'required|email|max:50',
            'email_verified_at' => 'date',
            'password' => ['sometimes', 'confirmed', 'exclude_if:password_confirmation,null'],
            'chklegal' => 'required|accepted|exclude',
        ];
    }

    /**
     * Handle a passed validation attempt.
     *
     * @return void
     */
    protected function passedValidation()
    {
        if ($this->has('password')) {
            $this->merge(
                ['password' => Hash::make($this->input('password'))]
            );
        }
    }

    public function validated(): array
    {
        if ($this->has('password')) {
            return array_merge(parent::validated(), ['password' => $this->input('password')]);
        }
        return parent::validated();
    }
}
