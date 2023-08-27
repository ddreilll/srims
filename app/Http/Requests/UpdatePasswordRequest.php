<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'password' => [
                'required', 'confirmed', 'string',
                'min:' . config('panel.password.min'),
                config('panel.password.lowercase') == "on" ? 'regex:/[a-z]/' : '',
                config('panel.password.uppercase') == "on" ? 'regex:/[A-Z]/' : '',
                config('panel.password.digits') == "on" ? 'regex:/[0-9]/' : '',
                config('panel.password.special') == "on" ? 'regex:/[@$!%*#?&]/' : '',
            ],
            'password_confirmation' => ['required', 'string'],
        ];
    }
}
