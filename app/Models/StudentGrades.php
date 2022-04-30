<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;



class StudentGrades extends Model
{
    use SoftDeletes;

    protected $table = 't_student_enrolled_subjects';

    const CREATED_AT = 'enrsub_createdAt';
    const UPDATED_AT = 'enrsub_updatedAt';
    const DELETED_AT = 'enrsub_deletedAt';

    // Subject details
    public function fetchOne($md5Id)
    {

        $data = $this->leftJoin('r_student', 'stud_enrsub_id', '=', 'stud_id')
            ->leftJoin('s_schedule', 'sche_enrsub_id', '=', 'sche_id')
            ->leftJoin('s_instructor', 'inst_sche_id', '=', 'inst_id')
            ->leftJoin('s_subject', 'subj_sche_id', '=', 'subj_id')
            ->leftJoin('s_term', 'term_sche_id', '=', 'term_id')
            ->selectRaw('t_student_enrolled_subjects.*
        , md5(enrsub_id) as enrsub_id_md5
        , stud_studentNo as enrsub_stud_no
        , stud_firstName as enrsub_stud_firstName
        , stud_middleName as enrsub_stud_middleName
        , stud_lastName as enrsub_stud_lastName
        , stud_suffix as enrsub_stud_suffixName
        , inst_firstName as enrsub_inst_firstName
        , inst_middleName as enrsub_inst_middleName
        , inst_lastName as enrsub_inst_lastName
        , inst_suffix as enrsub_inst_suffixName
        , subj_code as enrsub_subj_code
        , subj_name as enrsub_subj_name
        , subj_units as enrsub_subj_units
        , term_name as enrsub_term_name
        , CONCAT(sche_acadYear, " - ", sche_acadYear + 1) as enrsub_sche_acadYear
        , CONCAT(sche_acadYear, "-\'" ,SUBSTRING(sche_acadYear + 1, 3, 2)) as enrsub_sche_acadYear_short
        ')
            ->whereRaw('md5(enrsub_id) = "' . $md5Id . '"')
            ->get();

        $data[0]['enrsub_stud_fullName'] = format_name(1, null,  $data[0]['enrsub_stud_firstName'], $data[0]['enrsub_stud_middleName'], $data[0]['enrsub_stud_lastName'], $data[0]['enrsub_stud_suffixName']);
        $data[0]['enrsub_inst_fullName'] = format_name(1, "",  $data[0]['enrsub_inst_firstName'], $data[0]['enrsub_inst_middleName'], $data[0]['enrsub_inst_lastName'], $data[0]['enrsub_inst_suffixName']);
        return $data;
    }

    public function insertOne($data)
    {

        $this->enrsub_grade = $data['grade'];
        $this->enrsub_otherGrade = $data['other_grades'];
        $this->enrsub_remarks = $data['remarks'];
        $this->sche_enrsub_id = $data['schedule'];
        $this->stud_enrsub_id = $data['student'];
        $this->enrsub_status = 'UNVALIDATED';
        $this->save();

        return $this->id;
    }

    public function fetchAll($size, $filter)
    {
        $data = $this->leftJoin('r_student', 'stud_enrsub_id', '=', 'stud_id')
            ->leftJoin('s_schedule', 'sche_enrsub_id', '=', 'sche_id')
            ->leftJoin('s_instructor', 'inst_sche_id', '=', 'inst_id')
            ->leftJoin('s_subject', 'subj_sche_id', '=', 'subj_id')
            ->leftJoin('s_term', 'term_sche_id', '=', 'term_id')
            ->selectRaw('t_student_enrolled_subjects.*
            , md5(enrsub_id) as enrsub_id_md5
            , stud_studentNo as enrsub_stud_no
            , stud_uuid as enrsub_stud_uuid
            , stud_firstName as enrsub_stud_firstName
            , stud_middleName as enrsub_stud_middleName
            , stud_lastName as enrsub_stud_lastName
            , stud_suffix as enrsub_stud_suffixName
            , inst_firstName as enrsub_inst_firstName
            , inst_middleName as enrsub_inst_middleName
            , inst_lastName as enrsub_inst_lastName
            , inst_suffix as enrsub_inst_suffixName
            , subj_code as enrsub_subj_code
            , subj_name as enrsub_subj_name
            , subj_units as enrsub_subj_units
            , term_name as enrsub_term_name
            , CONCAT(sche_acadYear, " - ", sche_acadYear + 1) as enrsub_sche_acadYear
            , CONCAT(sche_acadYear, "-\'" ,SUBSTRING(sche_acadYear + 1, 3, 2)) as enrsub_sche_acadYear_short
            ')
            ->where($filter)
            ->paginate($size, ['*'], 'start');

        $i = 0;
        foreach ($data as $schedule) {

            $data[$i]['enrsub_stud_fullName'] = format_name(1, null,  $schedule['enrsub_stud_firstName'], $schedule['enrsub_stud_middleName'], $schedule['enrsub_stud_lastName'], $schedule['enrsub_stud_suffix']);
            $data[$i]['enrsub_inst_fullName'] = format_name(1, null,  $schedule['enrsub_inst_firstName'], $schedule['enrsub_inst_middleName'], $schedule['enrsub_inst_lastName'], $schedule['enrsub_inst_suffix']);


            if ($data[$i]['enrsub_otherGrade'] == "INC" && $schedule['enrsub_grade']) {

                $data[$i]['enrsub_grade_display'] = $schedule['enrsub_grade'] . "/INC";
            } else if ($data[$i]['enrsub_otherGrade'] == "INC" && !$schedule['enrsub_grade']) {

                $data[$i]['enrsub_grade_display'] = "INC";
            } else if ($schedule['enrsub_otherGrade'] == "W" || $schedule['enrsub_otherGrade'] == "D") {

                $data[$i]['enrsub_grade_display'] = $schedule['enrsub_otherGrade'];
            } else {

                $data[$i]['enrsub_grade_display'] = $schedule['enrsub_grade'];
            }

            $i++;
        }

        return $data;
    }

    public function edit($md5Id, $data)
    {
        $user = \Auth::user();
        $user_roleID = $user->roles->pluck('id')->toArray()[0];

        if ($user_roleID == 2) {
            $data["enrsub_status"] = "UNVALIDATED";
        }

        $this->whereRaw('md5(enrsub_id) = "' . $md5Id . '"')
            ->update($data);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(enrsub_id) = "' . $md5Id . '"')
            ->delete();
    }

    public function fetchAllPerStudent($md5Id)
    {

        $return_data = [];
        $return_data['total_semester'] = 0;
        $return_data['total_summer_semester'] = 0;

        $school_year = $this->leftJoin('s_schedule', 'sche_enrsub_id', '=', 'sche_id')
            ->selectRaw('DISTINCT sche_acadYear as acad_year
            , CONCAT(sche_acadYear, " - ", sche_acadYear + 1) as acad_year_long
            , CONCAT(sche_acadYear, "-\'" ,SUBSTRING(sche_acadYear + 1, 3, 2)) as acad_year_short
            ')
            ->whereRaw('md5(stud_enrsub_id) = "' . $md5Id . '"')
            ->orderBy('acad_year', 'desc')
            ->get();

        $i = 0;
        foreach ($school_year as $year) {

            $semesters = $this->leftJoin('s_schedule', 'sche_enrsub_id', '=', 'sche_id')
                ->leftJoin('s_term', 'term_sche_id', '=', 'term_id')
                ->selectRaw('DISTINCT term_name, term_order')
                ->whereRaw('md5(stud_enrsub_id) = "' . $md5Id . '" and sche_acadYear = "' . $year->acad_year . '"')
                ->orderBy('term_order', 'desc')
                ->get();

            $a = 0;
            foreach ($semesters as $semester) {
                $return_data['total_semester'] += 1;

                if ($semester['term_name'] == "Summer Semester") {
                    $return_data['total_summer_semester'] += 1;
                }

                $grades = $this->leftJoin('r_student', 'stud_enrsub_id', '=', 'stud_id')
                    ->leftJoin('s_schedule', 'sche_enrsub_id', '=', 'sche_id')
                    ->leftJoin('s_instructor', 'inst_sche_id', '=', 'inst_id')
                    ->leftJoin('s_subject', 'subj_sche_id', '=', 'subj_id')
                    ->leftJoin('s_term', 'term_sche_id', '=', 'term_id')
                    ->selectRaw('t_student_enrolled_subjects.*
                    , md5(enrsub_id) as enrsub_id_md5
                    , inst_firstName as enrsub_inst_firstName
                    , inst_middleName as enrsub_inst_middleName
                    , inst_lastName as enrsub_inst_lastName
                    , inst_suffix as enrsub_inst_suffixName
                    , subj_code as enrsub_subj_code
                    , subj_name as enrsub_subj_name
                    , subj_units as enrsub_subj_units
                    , sche_section as enrsub_sche_section
                    ')
                    ->whereRaw('md5(stud_enrsub_id) = "' . $md5Id . '" and term_name = "' . $semester->term_name . '"and sche_acadYear = "' . $year->acad_year . '"')
                    ->get();

                $b = 0;
                foreach ($grades as $grade) {

                    if ($grade['enrsub_otherGrade'] == "INC" && $grade['enrsub_grade']) {

                        $grades[$b]['enrsub_grade_display'] = $grade['enrsub_grade'] . "/INC";
                    } else if ($grade['enrsub_otherGrade'] == "INC" && !$grade['enrsub_grade']) {

                        $grades[$b]['enrsub_grade_display'] = "INC";
                    } else if ($grade['enrsub_otherGrade'] == "W" || $grade['enrsub_otherGrade'] == "D") {

                        $grades[$b]['enrsub_grade_display'] = $grade['enrsub_otherGrade'];
                    } else {

                        $grades[$b]['enrsub_grade_display'] = $grade['enrsub_grade'];
                    }

                    $grades[$b]['enrsub_inst_fullName'] = format_name(1, "",  $grades[$b]['enrsub_inst_firstName'], $grades[$b]['enrsub_inst_middleName'], $grades[$b]['enrsub_inst_lastName'], $grades[$b]['enrsub_inst_suffixName']);

                    $b++;
                }

                $semesters[$a]['subjects'] = $grades;
                $a++;
            }

            $school_year[$i]['semesters'] = $semesters;
            $i++;
        }

        $return_data["grades"] = $school_year;

        return $return_data;
    }
}
