<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionCriteria extends Model
{
    protected $table = 's_admission_criteria';

    const CREATED_AT = 'adcr_dateCreated';
    const UPDATED_AT = 'adcr_dateUpdated';

    // Criteria Requirements

    public function fetchRequirements($md5Id)
    {

        $data = $this->leftJoin('s_admission_req_criteria', 'adcr_arcr_id', '=', 'adcr_id')
            ->leftJoin('s_admission_req', 'adre_arcr_id', '=', 'adre_id')
            ->select('s_admission_req.*', 'arcr_id')
            ->whereRaw('md5(adcr_id) = "' . $md5Id . '" AND arcr_isDeleted = "0"')
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
            ->get();

        $data['0']['adcr_id_md5'] = md5($data['0']['adcr_id']);

        return $data;
    }

    public function fetchAll($filter)
    {

        $adCriteria = $this;
        $data = $adCriteria->where($filter)
            ->where(["adcr_isDeleted" => "0"])
            ->get();

        for ($i = 0; $i < sizeOf($data); $i++) {
            $data[$i]['adcr_id_md5'] = md5($data[$i]['adcr_id']);
        }

        return $data;
    }

    public function insertOne($data)
    {

        $adCriteria = $this;

        $adCriteria->adcr_yearStart = $data['yearStart'];
        $adCriteria->adcr_yearEnd = $data['yearEnd'];
        $adCriteria->save();

        return $adCriteria->id;
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
            ->update(['adcr_isDeleted' => '1']);
    }
}
