<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    protected $table = 's_subject';
    protected $primaryKey = 'subj_id';

    const CREATED_AT = 'subj_createdAt';
    const UPDATED_AT = 'subj_updatedAt';
    const DELETED_AT = 'subj_deletedAt';

    // Subject details
    public function fetchOne($md5Id)
    {

        $data = $this->whereRaw('md5(subj_id) = "' . $md5Id . '"')
            ->selectRaw('s_subject.*, md5(subj_id) AS subj_id_md5, FORMAT(subj_units, 1) as subj_units')
            ->get();

        return $data;
    }

    public function insertOne($data)
    {

        $this->subj_code = $data['code'];
        $this->subj_name = $data['name'];
        $this->subj_units = round($data['units'], 1);
        $this->save();

        return $this->subj_id;
    }

    public function fetchAll($filter)
    {
        $data = $this->where($filter)
            ->selectRaw('s_subject.*, md5(subj_id) as subj_id_md5, FORMAT(subj_units, 1) as subj_units')
            ->get();

        return $data;
    }

    public function edit($md5Id, $data)
    {
        $this->whereRaw('md5(subj_id) = "' . $md5Id . '"')
            ->update([
                  'subj_code' => $data['code']
                , 'subj_name' => $data['name']
                , 'subj_units' => round($data['units'], 1)
            ]);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(subj_id) = "' . $md5Id . '"')
            ->delete();
    }

    // Subject prerequisite
    public function fetchPrerequisite($md5Id)
    {
        $data = $this->leftJoin('s_subject_prereq', 'subj_subjpreq_id', '=', 'subj_id')
            ->selectRaw('subjpreq_id
            , md5(subjpreq_id) AS `subjpreq_id_md5`
            , subjp_subjpreq_id AS `subjpreq_subjectId`')
            ->whereRaw("md5(subj_subjpreq_id) = '" . $md5Id . "' and subjpreq_deletedAt is null")
            ->get();

        for ($i = 0; $i < sizeOf($data); $i++) {
            $subject = $this->fetchOne(md5($data[$i]['subjpreq_subjectId']))[0];
            $data[$i]['subjpreq_subjectId_md5'] = $subject['subj_id_md5'];
            $data[$i]['subjpreq_subjectCode'] = $subject['subj_code'];
            $data[$i]['subjpreq_subjectName'] = $subject['subj_name'];
        }

        return $data;
    }

}
