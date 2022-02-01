<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $table = 's_course';
    protected $primaryKey = 'cour_id';

    const CREATED_AT = 'cour_createdAt';
    const UPDATED_AT = 'cour_updatedAt';
    const DELETED_AT = 'cour_deletedAt';

    public function insertOne($data)
    {
        $this->cour_code = $data['code'];
        $this->cour_name = $data['name'];
        $this->save();

        return $this->id;
    }

    public function fetchAll($filter)
    {
        $data = $this->where($filter)
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
                'cour_name' => $data['name'],
                'cour_code' => $data['code'],
            ]);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(cour_id) = "' . $md5Id . '"')
            ->delete();
    }
}
