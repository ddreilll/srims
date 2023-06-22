<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSemesterRequest extends FormRequest
{
    public function authorize()
    {
        // abort_if(Gate::denies('semester_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {   
        $semesterTable = request()->route('semester')->table;
        $semesterPrimaryKey = request()->route('semester')->primaryKey;

        return [
            'term_order'     => [
                'integer',
                'required',
                'min:0'
            ],
            'term_name'     => [
                'string',
                'required',
                sprintf('unique:%s,term_name,%s,%s,term_deletedAt,NULL', $semesterTable, request()->route('semester')->term_id, $semesterPrimaryKey),
            ],
        ];
    }
}
