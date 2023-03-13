<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documents extends Model
{
    use SoftDeletes;

    protected $table = 's_documents';
    protected $primaryKey = 'docu_id';

    const CREATED_AT = 'docu_createdAt';
    const UPDATED_AT = 'docu_updatedAt';
    const DELETED_AT = 'docu_deletedAt';

    public function insertOne($data)
    {
        $this->docu_name = $data->name;
        $this->docu_description = $data->description;
        $this->docu_category = $data->category;
        $this->save();
    }

    public function fetchAll($filter)
    {

        $data = $this->where($filter)
            ->selectRaw('s_documents.*, md5(docu_id) AS `docu_id_md5`')
            ->get();

        return $data;
    }

    public function fetchOne($md5Id)
    {

        $data = $this->whereRaw('md5(docu_id) = "' . $md5Id . '"')
            ->selectRaw('s_documents.*, md5(docu_id) AS `docu_id_md5`')
            ->get();

        return $data;
    }

    public function edit($md5Id, $data)
    {

        $this->whereRaw('md5(docu_id) = "' . $md5Id . '"')
            ->update($data);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(docu_id) = "' . $md5Id . '"')
            ->delete();
    }
}
