<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $courseTable = (new Course())->table;

        return [
            "cour_code" => [
                'required',
                'string',
                sprintf('unique:%s,cour_code,NULL,id,cour_deletedAt,NULL', $courseTable)
            ],
            "cour_name" => [
                'required',
                'string',
                sprintf('unique:%s,cour_name,NULL,id,cour_deletedAt,NULL', $courseTable)
            ]
        ];
    }
}
