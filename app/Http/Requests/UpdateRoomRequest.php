<?php

namespace App\Http\Requests;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $roomTable = request()->route('room')->table;
        $roomPrimaryKey = request()->route('room')->primaryKey;
        $roomId = request()->route('room')->room_id;
        
        return [
            "room_name" => [
                'required',
                'string',
                sprintf('unique:%s,room_name,%s,%s,room_deletedAt,NULL', $roomTable, $roomId, $roomPrimaryKey),
            ],
        ];
    }
}
