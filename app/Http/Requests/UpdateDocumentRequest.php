<?php

namespace App\Http\Requests;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $documentTable = request()->route('document')->table;
        $documentPrimaryKey = request()->route('document')->primaryKey;

        return [
            'docu_name'     => [
                'string',
                'required',
                sprintf('unique:%s,docu_name,%s,%s,docu_deletedAt,NULL', $documentTable, request()->route('document')->docu_id, $documentPrimaryKey),
            ],
            'docu_description'     => [
                'nullable',
                'string',
            ],
            'docu_category'     => [
                'string',
                'required',
            ],
            'types.*.docuType_name' => [
                'string'
            ]
        ];
    }
}
