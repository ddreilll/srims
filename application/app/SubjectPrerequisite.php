<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectPrerequisite extends Model
{
    protected $table = 's_subject_prereq';
    protected $primaryKey = 'subjpreq_id';

    const CREATED_AT = 'subjpreq_dateCreated';
    const UPDATED_AT = 'subjpreq_dateUpdated';

    public function fetchAll($filter)
    {
        $data = $this->where($filter)
            ->selectRaw('s_subject_prereq.*, md5(subjpreq_id) as subjpreq_id_md5')
            ->where(["subjpreq_isDeleted" => "0"])
            ->get();

        return $data;
    }

    public function fetchAssocSubject($subjectMd5Id)
    {
        $data = $this->leftjoin('s_subject', 'subj_id', '=', 'subj_subjpreq_id')
            ->selectRaw('s_subject.*, md5(subj_id) as subj_id_md5')
            ->whereRaw('md5(subjp_subjpreq_id) = "' . $subjectMd5Id . '" AND subjpreq_isDeleted = "0"')
            ->get();

        return $data;
    }

    public function insertOne($subjectId, $prerequisiteId)
    {
        $this->insert(["subj_subjpreq_id" => $subjectId, "subjp_subjpreq_id" => $prerequisiteId]);
    }

    public function remove($sujectId, $prerequisiteId)
    {
        $this->where(['subj_subjpreq_id' => $sujectId, 'subjp_subjpreq_id' => $prerequisiteId])
            ->update(['subjpreq_isDeleted' => '1']);
    }
}
