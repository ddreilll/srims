<?php

namespace App\Http\Requests;

use App\Models\Permission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateConfig2faRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('config_access') || Gate::denies('config_2fa_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'value'   => 'required|string',
        ];
    }
}
