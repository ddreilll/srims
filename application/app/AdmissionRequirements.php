<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionRequirements extends Model
{

    protected $table = 's_admission_req';

    const CREATED_AT = 'adre_dateCreated';
    const UPDATED_AT = 'adre_dateUpdated';

    public function fetchAll($filter)
    {

        $data = $this->where($filter)
            ->where(["adre_isDeleted" => "0"])
            ->get();

        for ($i = 0; $i < sizeOf($data); $i++) {
            $data[$i]['adre_id_md5'] = md5($data[$i]['adre_id']);
        }

        return $data;
    }

    public function fetchOne($md5Id)
    {

        $Req = $this;
        $data = $Req->whereRaw('md5(adre_id) = "' . $md5Id . '"')
            ->get();

        $data['0']['adre_id'] = md5($data['0']['adre_id']);

        return $data;
    }


    public function insertOne($data)
    {

        $Req = $this;

        $Req->adre_docuCode = $data->code;
        $Req->adre_docuName = $data->name;
        $Req->adre_docuDescription = $data->description;
        $Req->save();
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
