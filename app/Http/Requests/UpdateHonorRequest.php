<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHonorRequest extends FormRequest
{
    public function authorize()
    {
        // abort_if(Gate::denies('honor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        $honorTable = request()->route('honor')->table;
        $honorPrimaryKey = request()->route('honor')->primaryKey;

        return [
            'honor_name'    => [
                'string',
                'required',
                sprintf('unique:%s,honor_name,%s,%s,honor_deletedAt,NULL', $honorTable, request()->route('honor')->honor_id, $honorPrimaryKey),
            ],
        ];
    }
}
