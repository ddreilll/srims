<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 's_instructor';
    protected $primaryKey = 'inst_id';

    const CREATED_AT = 'inst_dateCreated';
    const UPDATED_AT = 'inst_dateUpdated';

    public function insertOne($data)
    {
        $this->inst_empNo = $data['empNo'];
        $this->inst_name = $data['name'];
        $this->save();

        return $this->id;
    }

    public function fetchAll($filter)
    {
        $data = $this->where($filter)
            ->where(["inst_isDeleted" => "0"])
            ->selectRaw('s_instructor.*, md5(inst_id) AS inst_id_md5')
            ->get();

        return $data;
    }

    public function fetchOne($md5Id)
    {
        $data = $this->whereRaw('md5(inst_id) = "' . $md5Id . '"')
            ->selectRaw('s_instructor.*, md5(inst_id) AS inst_id_md5')
            ->get();

        return $data;
    }

    public function edit($md5Id, $data)
    {
        $this->whereRaw('md5(inst_id) = "' . $md5Id . '"')
            ->update([
                'inst_empNo' => $data['empNo'],
                'inst_name' => $data['name']
            ]);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(inst_id) = "' . $md5Id . '"')
            ->update(['inst_isDeleted' => '1']);
    }
}
