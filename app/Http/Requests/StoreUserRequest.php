<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'     => [
                'required',
                'min:3'
            ],
            'email'    => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
                'confirmed',
                'min:6'
            ],
            'password_confirmation' => [
                'required',
                'min:6'
            ],
            'phone' => [
                'required',
                'regex:/^([0-9\s\-\+\(\)]*)$/','min:10',
                'unique:users',
            ],
            'roles.*'  => [
                'integer',
            ],
            'roles'    => [
                'required',
                'array',
            ],
        ];
    }
}
