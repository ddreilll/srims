<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Honor extends Model
{
    use SoftDeletes;

    protected $table = 's_honor';

    const CREATED_AT = 'honor_createdAt';
    const UPDATED_AT = 'honor_updatedAt';
    const DELETED_AT = 'honor_deletedAt';

    public function insertOne($data)
    {
        $this->honor_name = $data['name'];
        $this->save();

        return $this->id;
    }

    public function fetchAll($filter)
    {
        $data = $this->where($filter)
            ->selectRaw('s_honor.*, md5(honor_id) as honor_id_md5')
            ->get();

        return $data;
    }

    public function fetchOne($md5Id)
    {
        $data = $this->whereRaw('md5(honor_id) = "' . $md5Id . '"')
            ->selectRaw('s_honor.*, md5(honor_id) AS honor_id_md5')
            ->get();

        return $data;
    }

    public function edit($md5Id, $data)
    {
        $this->whereRaw('md5(honor_id) = "' . $md5Id . '"')
            ->update($data);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(honor_id) = "' . $md5Id . '"')
            ->delete();
    }
}