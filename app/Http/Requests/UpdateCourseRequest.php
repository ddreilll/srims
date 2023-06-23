<?php

namespace App\Http\Requests;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $courseTable = request()->route('course')->table;
        $coursePrimaryKey = request()->route('course')->primaryKey;
        $courseId = request()->route('course')->cour_id;

        return [
            "cour_code" => [
                'required',
                'string',
                sprintf('unique:%s,cour_code,%s,%s,cour_deletedAt,NULL', $courseTable, $courseId, $coursePrimaryKey),
            ],
            "cour_name" => [
                'required',
                'string',
                sprintf('unique:%s,cour_name,%s,%s,cour_deletedAt,NULL', $courseTable, $courseId, $coursePrimaryKey),
            ]
        ];
    }
}
