<?php

namespace App\Http\Requests;

use App\Models\Honor;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreHonorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('honor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'honor_name'     => [
                'string',
                'required',
                'unique:' . (new Honor())->table . ',honor_name,NULL,id,honor_deletedAt,NULL',
            ],
        ];
    }
}
