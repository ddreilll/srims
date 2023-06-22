<?php

namespace App\Http\Requests;

use App\Models\SchoolYear;
use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolYearRequest extends FormRequest
{
    public function authorize()
    {
        // abort_if(Gate::denies('school_year_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'syear_year'     => [
                'required',
                'numeric',
                'digits:4',
                'before:' . (date('Y') + 1),
                'unique:' . (new SchoolYear())->table . ',syear_year,NULL,id,syear_deletedAt,NULL',
            ],
        ];
    }

    public function attributes()
    {
        return [
            'syear_year' => __('cruds.schoolYear.fields.syear_year'),
        ];
    }
}
