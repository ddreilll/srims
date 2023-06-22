<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateYearLevelRequest extends FormRequest
{
    public function authorize()
    {
        // abort_if(Gate::denies('year_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {   
        $yearLevelTable = request()->route('year_level')->table;
        $yearLevelPrimaryKey = request()->route('year_level')->primaryKey;

        return [
            'year_order'     => [
                'integer',
                'required',
                'min:0'
            ],
            'year_name'     => [
                'string',
                'required',
                sprintf('unique:%s,year_name,%s,%s,year_deletedAt,NULL', $yearLevelTable, request()->route('year_level')->year_id, $yearLevelPrimaryKey),
            ],
        ];
    }
}
