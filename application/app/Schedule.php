<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 's_schedule';

    const CREATED_AT = 'sche_dateCreated';
    const UPDATED_AT = 'sche_dateUpdated';


    public function insertOne($data)
    {

        $this->subj_sche_id = $data['subject'];
        $this->sche_section = $data['section'];
        $this->term_sche_id = $data['semester'];
        $this->sche_acadYear = $data['year'];
        $this->room_sche_id = $data['room'];
        $this->inst_sche_id = $data['instructor'];
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
            , inst_id as sche_inst_id
            , inst_name as sche_inst_name')
            ->whereRaw(($filter) ? $filter . " and sche_isDeleted = '0'" : "sche_isDeleted = '0'")
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
            , room_id as sche_room_id
            , room_name as sche_room_code
            , subj_id as sche_subj_id
            , subj_code as sche_subj_code
            , subj_name as sche_subj_name
            , term_sche_id as sche_term_id
            , term_name as sche_term_name
            , CONCAT(sche_acadYear, " - ", sche_acadYear + 1) as sche_acadYear
            , sche_acadYear as sche_year
            , inst_id as sche_inst_id
            , inst_name as sche_inst_name')
            ->whereRaw('md5(sche_id) = "' . $md5Id . '"')
            ->where(["sche_isDeleted" => "0"])
            ->get();

        return $data;
    }

    public function edit($md5Id, $data)
    {
        $this->whereRaw('md5(sche_id) = "' . $md5Id . '"')
            ->update([
                'sche_section' => $data['section'], 'sche_acadYear' => $data['year'], 'term_sche_id' => $data['semester'], 'room_sche_id' => $data['room'], 'subj_sche_id' => $data['subject'], 'inst_sche_id' => $data['instructor']
            ]);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(sche_id) = "' . $md5Id . '"')
            ->update(['sche_isDeleted' => '1']);
    }

    // Schedule Timeslots
    public function fetchTimeSlots($md5Id)
    {
        $data = $this->leftJoin('s_time_slot', 'sche_time_id', '=', 'sche_id')
            ->selectRaw('time_id
            , md5(time_id) AS `time_id_md5`
            , time_day
            , time_duration')
            ->whereRaw('md5(sche_time_id) = "' . $md5Id . '" AND time_isDeleted = "0"')
            ->get();

        return $data;
    }
}
