<?php

namespace App\Http\Requests;

use App\Models\Document;
use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // abort_if(Gate::denies('document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'docu_name'     => [
                'string',
                'required',
                'unique:' . (new Document())->table . ',docu_name,NULL,id,docu_deletedAt,NULL',
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
