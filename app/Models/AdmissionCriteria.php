<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionCriteria extends Model
{
    use SoftDeletes;

    protected $table = 's_admission_criteria';

    const CREATED_AT = 'adcr_createdAt';
    const UPDATED_AT = 'adcr_updatedAt';
    const DELETED_AT = 'adcr_deletedAt';

    // Criteria Requirements

    public function fetchRequirements($md5Id)
    {

        $data = $this->leftJoin('s_admission_req_criteria', 'adcr_arcr_id', '=', 'adcr_id')
            ->leftJoin('s_admission_req', 'adre_arcr_id', '=', 'adre_id')
            ->select('s_admission_req.*', 'arcr_id')
            ->whereRaw('md5(adcr_id) = "' . $md5Id . '" and arcr_deletedAt is null')
            ->get();

        for ($i = 0; $i < sizeOf($data); $i++) {
            $data[$i]['arcr_id_md5'] = md5($data[$i]['arcr_id']);
        }

        return $data;
    }

    // Criteria Details

    public function fetchOne($md5Id)
    {

        $adCriteria = $this;
        $data = $adCriteria->whereRaw('md5(adcr_id) = "' . $md5Id . '"')
        ->selectRaw('s_admission_criteria.*, md5(adcr_id) AS `adcr_id_md5`')
            ->get();

        return $data;
    }

    public function fetchAll($filter)
    {

        $adCriteria = $this;
        $data = $adCriteria->where($filter)
            ->selectRaw('s_admission_criteria.*, md5(adcr_id) AS `adcr_id_md5`')
            ->get();

        return $data;
    }

    public function insertOne($data)
    {

        $this->adcr_yearStart = $data['yearStart'];
        $this->adcr_yearEnd = $data['yearEnd'];
        $this->save();

        return $this->id;
    }

    public function edit($md5Id, $data)
    {
        $this->whereRaw('md5(adcr_id) = "' . $md5Id . '"')
            ->update([
                'adcr_yearStart' => $data['yearStart'], 'adcr_yearEnd' => $data['yearEnd']
            ]);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(adcr_id) = "' . $md5Id . '"')
            ->delete();
    }
}
