<?php

namespace App\Http\Requests;

use App\Models\Instructor;
use Illuminate\Foundation\Http\FormRequest;

class StoreInstructorRequest extends FormRequest
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
        $instructorTable = (new Instructor())->table;

        return [
            "inst_empNo" => [
                'required',
                'string',
                sprintf('unique:%s,inst_empNo,NULL,id,inst_deletedAt,NULL', $instructorTable)
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
