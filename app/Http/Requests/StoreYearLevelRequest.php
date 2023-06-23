<?php

namespace App\Http\Requests;

use App\Models\YearLevel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreYearLevelRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('year_level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'year_order'     => [
                'integer',
                'required',
                'min:0'
            ],
            'year_name'     => [
                'string',
                'required',
                'unique:' . (new YearLevel())->table . ',year_name,NULL,id,year_deletedAt,NULL',
            ],
        ];
    }
}
