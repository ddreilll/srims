<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // abort_if(Gate::denies('subject_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $subject = request()->route('subject');
        $subjectTable = $subject->table;
        $subjectPrimaryKey = $subject->primaryKey;
        $subjectId = $subject->subj_id;

        return [
            'subj_code' => sprintf('required|string|unique:%s,subj_code,%s,%s,subj_deletedAt,NULL', $subjectTable, $subjectId, $subjectPrimaryKey),
            'subj_name' => sprintf('required|string|unique:%s,subj_name,%s,%s,subj_deletedAt,NULL', $subjectTable, $subjectId, $subjectPrimaryKey),
            'subj_units' => 'required|numeric|min:1',
        ];
    }
}
