<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 's_course';
    protected $primaryKey = 'cour_id';

    const CREATED_AT = 'cour_dateCreated';
    const UPDATED_AT = 'cour_dateUpdated';

    public function insertOne($data)
    {

        $course = $this;

        $course->cour_code = $data['code'];
        $course->cour_name = $data['name'];
        $course->cour_description = $data['description'];
        $course->save();

        return $course->id;
    }

    public function fetchAll($filter)
    {

        $data = $this->where($filter)
            ->where(["cour_isDeleted" => "0"])
            ->selectRaw('s_course.*, md5(cour_id) AS cour_id_md5')
            ->get();

        return $data;
    }

    public function fetchOne($md5Id)
    {

        $data = $this->whereRaw('md5(cour_id) = "' . $md5Id . '"')
            ->selectRaw('s_course.*, md5(cour_id) AS cour_id_md5')
            ->get();

        return $data;
    }

    public function edit($md5Id, $data)
    {

        $this->whereRaw('md5(cour_id) = "' . $md5Id . '"')
            ->update([
                'cour_name' => $data['name'], 'cour_code' => $data['code'], 'cour_description' => $data['description']
            ]);
    }

    public function remove($md5Id)
    {

        $this->whereRaw('md5(cour_id) = "' . $md5Id . '"')
            ->update(['cour_isDeleted' => '1']);
    }
}
