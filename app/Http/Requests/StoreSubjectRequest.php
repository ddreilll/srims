<?php

namespace App\Http\Requests;

use App\Models\Subject;
use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // abort_if(Gate::denies('subject_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $subjectTable = (new Subject())->table;

        return [
            'subj_code' => sprintf('required|string|unique:%s,subj_code,NULL,id,subj_deletedAt,NULL', $subjectTable),
            'subj_name' => sprintf('required|string|unique:%s,subj_name,NULL,id,subj_deletedAt,NULL', $subjectTable),
            'subj_units' => 'required|numeric|min:1',
        ];
    }
}
