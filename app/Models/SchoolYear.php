<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolYear extends Model
{
    use SoftDeletes;

    protected $table = 's_school_year';

    const CREATED_AT = 'syear_createdAt';
    const UPDATED_AT = 'syear_updatedAt';
    const DELETED_AT = 'syear_deletedAt';

    public function insertOne($data)
    {
        $this->syear_year = $data['year'];
        $this->save();

        return $this->id;
    }

    public function fetchAll($filter)
    {
        $data = $this->where($filter)
            ->selectRaw('s_school_year.*, md5(syear_id) as syear_id_md5')
            ->get();

        return $data;
    }

    public function fetchOne($md5Id)
    {
        $data = $this->whereRaw('md5(syear_id) = "' . $md5Id . '"')
            ->selectRaw('s_school_year.*, md5(syear_id) AS syear_id_md5')
            ->get();

        return $data;
    }

    public function edit($md5Id, $data)
    {
        $this->whereRaw('md5(syear_id) = "' . $md5Id . '"')
            ->update($data);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(syear_id) = "' . $md5Id . '"')
            ->delete();
    }
}