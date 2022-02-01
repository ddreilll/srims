<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdmissionRequirements extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 's_admission_req';

    const CREATED_AT = 'adre_createdAt';
    const UPDATED_AT = 'adre_updatedAt';
    const DELETED_AT = 'adre_deletedAt';

    public function insertOne($data)
    {
        $this->adre_docuCode = $data->code;
        $this->adre_docuName = $data->name;
        $this->adre_docuDescription = $data->description;
        $this->save();
    }

    public function fetchAll($filter)
    {

        $data = $this->where($filter)
            ->selectRaw('s_admission_req.*, md5(adre_id) AS `adre_id_md5`')
            ->get();

        return $data;
    }

    public function fetchOne($md5Id)
    {

        $data = $this->whereRaw('md5(adre_id) = "' . $md5Id . '"')
            ->selectRaw('s_admission_req.*, md5(adre_id) AS `adre_id_md5`')
            ->get();

        return $data;
    }

    public function edit($md5Id, $data)
    {

        $this->whereRaw('md5(adre_id) = "' . $md5Id . '"')
            ->update([
                'adre_docuName' => $data['name'], 'adre_docuCode' => $data['code'], 'adre_docuDescription' => $data['description']
            ]);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(adre_id) = "' . $md5Id . '"')
            ->delete();
    }
}
