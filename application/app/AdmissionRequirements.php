<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionRequirements extends Model
{

    protected $table = 's_admission_req';

    const CREATED_AT = 'adre_dateCreated';
    const UPDATED_AT = 'adre_dateUpdated';

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
            ->where(["adre_isDeleted" => "0"])
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
            ->update(['adre_isDeleted' => '1']);
    }
}
