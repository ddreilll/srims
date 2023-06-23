<?php

namespace App\Http\Requests;

use App\Models\Term;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreSemesterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('semester_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'term_order'     => [
                'integer',
                'required',
                'min:0'
            ],
            'term_name'     => [
                'string',
                'required',
                'unique:' . (new Term())->table . ',term_name,NULL,id,term_deletedAt,NULL',
            ],
        ];
    }
}
