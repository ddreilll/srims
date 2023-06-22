<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectPrerequisite extends Model
{
    use SoftDeletes;

    public $table = 's_subject_prereq';
    public $primaryKey = 'subjpreq_id';

    const CREATED_AT = 'subjpreq_createdAt';
    const UPDATED_AT = 'subjpreq_updatedAt';
    const DELETED_AT = 'subjpreq_deletedAt';

    public function fetchAll($filter)
    {
        $data = $this->where($filter)
            ->selectRaw('s_subject_prereq.*, md5(subjpreq_id) as subjpreq_id_md5')
            ->get();

        return $data;
    }

    public function fetchAssocSubject($subjectMd5Id)
    {
        $data = $this->leftjoin('s_subject', 'subj_id', '=', 'subj_subjpreq_id')
            ->selectRaw('s_subject.*, md5(subj_id) as subj_id_md5')
            ->whereRaw("md5(subjp_subjpreq_id) = '" . $subjectMd5Id . "'")
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
            ->delete();
    }
}
