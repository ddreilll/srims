<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    protected $table = 's_schedule';
    protected $primaryKey = 'sche_id';

    const CREATED_AT = 'sche_createdAt';
    const UPDATED_AT = 'sche_updatedAt';
    const DELETED_AT = 'sche_deletedAt';

    public function insertOne($data)
    {

        $this->subj_sche_id = $data['subject'];
        $this->sche_section = $data['section'];
        $this->sche_acadYear = $data['year'];
        $this->term_sche_id = $data['semester'];
        $this->room_sche_id = $data['room'];
        $this->inst_sche_id = $data['instructor'];
        $this->sche_filelink = $data['file_link'];
        $this->save();

        return $this->id;
    }

    public function fetchAll($filter)
    {
        $data = $this->leftJoin('s_room', 'room_sche_id', '=', 'room_id')
            ->leftJoin('s_subject', 'subj_sche_id', '=', 'subj_id')
            ->leftJoin('s_instructor', 'inst_sche_id', '=', 'inst_id')
            ->leftJoin('s_term', 'term_sche_id', '=', 'term_id')
            ->selectRaw('md5(sche_id) as sche_id_md5
            , sche_id 
            , sche_section
            , room_id as sche_room_id
            , room_name as sche_room_code
            , subj_id as sche_subj_id
            , subj_code as sche_subj_code
            , subj_name as sche_subj_name
            , term_sche_id as sche_term_id
            , term_name as sche_term_name
            , CONCAT(sche_acadYear, " - ", sche_acadYear + 1) as sche_acadYear
            , CONCAT("SY " , sche_acadYear, "-\'" ,SUBSTRING(sche_acadYear + 1, 3, 2)) as sche_acadYear_short
            , inst_id as sche_inst_id
            , inst_firstName as sche_inst_name_first 
            , inst_middleName as sche_inst_name_middle
            , inst_lastName as sche_inst_name_last
            , inst_suffix as sche_inst_name_suffix')
            ->whereRaw(($filter) ? $filter : "sche_deletedAt is null")
            ->get();

        return $data;
    }

    public function fetchOne($md5Id)
    {
        $data = $this->leftJoin('s_room', 'room_sche_id', '=', 'room_id')
            ->leftJoin('s_subject', 'subj_sche_id', '=', 'subj_id')
            ->leftJoin('s_instructor', 'inst_sche_id', '=', 'inst_id')
            ->leftJoin('s_term', 'term_sche_id', '=', 'term_id')
            ->selectRaw('md5(sche_id) as sche_id_md5
            , sche_id 
            , sche_section
            , sche_filelink
            , sche_acadYear as sche_year
            , room_id as sche_room_id
            , room_name as sche_room_code
            , subj_id as sche_subj_id
            , subj_code as sche_subj_code
            , subj_name as sche_subj_name
            , term_sche_id as sche_term_id
            , term_name as sche_term_name
            , inst_id as sche_inst_id
            , inst_firstName as sche_inst_name_first
            , inst_middleName as sche_inst_name_middle
            , inst_lastName as sche_inst_name_last
            , inst_suffix as sche_inst_name_suffix')
            ->whereRaw('md5(sche_id) = "' . $md5Id . '"')
            ->get();

        return $data;
    }

    public function edit($md5Id, $data)
    {
        $this->whereRaw('md5(sche_id) = "' . $md5Id . '"')
            ->update([
                'sche_section' => $data['section'], 'sche_acadYear' => $data['year'], 'term_sche_id' => $data['semester'], 'room_sche_id' => $data['room'], 'subj_sche_id' => $data['subject'], 'inst_sche_id' => $data['instructor'],'sche_filelink' => $data['file_link']
            ]);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(sche_id) = "' . $md5Id . '"')
            ->delete();
    }

    // Schedule Timeslots
    public function fetchTimeSlots($md5Id)
    {
        $data = $this->leftJoin('s_time_slot', 'sche_time_id', '=', 'sche_id')
            ->selectRaw('time_id
            , md5(time_id) AS `time_id_md5`
            , time_day
            , time_duration')
            ->whereRaw("md5(sche_time_id) = '" . $md5Id . "' and time_deletedAt is null")
            ->get();

        return $data;
    }
}