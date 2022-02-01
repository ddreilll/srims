<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionRequirementsCriteria extends Model
{
    use SoftDeletes;

    protected $table = 's_admission_req_criteria';
    protected $primaryKey = 'arcr_id';

    const CREATED_AT = 'arcr_createdAt';
    const UPDATED_AT = 'arcr_updatedAt';
    const DELETED_AT = 'arcr_deletedAt';


    public function insertOne($criteriaId, $requirementId)
    {
        $this->insert(["adcr_arcr_id" => $criteriaId, "adre_arcr_id" => $requirementId]);
    }

    public function fetchAll($filter = null)
    {
        $data = $this->where($filter)
            ->get();

        for ($i = 0; $i < sizeOf($data); $i++) {
            $data[$i]['arcr_id_md5'] = md5($data[$i]['arcr_id']);
        }

        return $data;
    }

    public function remove($requirementId, $criteriaId)
    {
        $this->where(['adre_arcr_id' => $requirementId, 'adcr_arcr_id' => $criteriaId])
            ->delete();
    }
}
