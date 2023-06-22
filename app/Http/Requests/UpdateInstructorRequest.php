<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInstructorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // abort_if(Gate::denies('instructor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $instructorTable = request()->route('instructor')->table;
        $instructorPrimaryKey = request()->route('instructor')->primaryKey;
        $instructorId = request()->route('instructor')->inst_id;

        return [
            "inst_empNo" => [
                'required',
                'string',
                sprintf('unique:%s,inst_empNo,%s,%s,inst_deletedAt,NULL', $instructorTable, $instructorId, $instructorPrimaryKey),
            ],
            "inst_firstName" => [
                'required',
                'string',
            ],
            "inst_middleName" => [
                'nullable',
                'string',
            ],
            "inst_lastName" => [
                'required',
                'string',
            ],
        ];
    }
}
