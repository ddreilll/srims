<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionRequirementsCriteria extends Model
{
    protected $table = 's_admission_req_criteria';
    protected $primaryKey = 'arcr_id';

    const CREATED_AT = 'arcr_dateCreated';
    const UPDATED_AT = 'arcr_dateUpdated';


    public function insertOne($criteriaId, $requirementId)
    {
        $this->insert(["adcr_arcr_id" => $criteriaId, "adre_arcr_id" => $requirementId]);
    }

    public function fetchAll($filter)
    {
        $data = $this->where($filter)
            ->where(["arcr_isDeleted" => "0"])
            ->get();

        for ($i = 0; $i < sizeOf($data); $i++) {
            $data[$i]['arcr_id_md5'] = md5($data[$i]['arcr_id']);
        }

        return $data;
    }

    public function remove($requirementId, $criteriaId)
    {
        $this->where(['adre_arcr_id' => $requirementId, 'adcr_arcr_id' => $criteriaId])
            ->update(['arcr_isDeleted' => '1']);
    }
}
