<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Faker\Generator;


class StudentProfile extends Model
{
    use SoftDeletes;

    public $table = 'r_student';
    public $primaryKey = 'stud_id';

    const CREATED_AT = 'stud_createdAt';
    const UPDATED_AT = 'stud_updatedAt';
    const DELETED_AT = 'stud_deletedAt';

    public function course()
    {
        return $this->hasOne(Course::class, 'cour_id', 'cour_stud_id' );
    }

    public function documents()
    {
        return $this->belongsToMany(Documents::class, 't_submitted_documents', 'subm_student', 'subm_document')->withPivot([
            'subm_documentType'
            ,'subm_documentType_1'
            ,'subm_documentType_2'
            ,'subm_documentType_3'
            ,'subm_documentCategory'
            ,'subm_remarks'
            ,'subm_dateSubmitted'
        ]);
    }

    public function gradesheet()
    {
        return $this->belongsTo(Gradesheet::class, 'grdsheetpg_gradesheet_id');
    }


    // Subject details
    public function fetchOne($md5Id)
    {

        $data = $this->leftJoin('s_course', 'cour_stud_id', '=', 'cour_id')
            ->whereRaw('md5(stud_id) = "' . $md5Id . '"')
            ->selectRaw('r_student.*
            , md5(stud_id) as stud_id_md5
            , cour_name as stud_course_name
            , cour_code as stud_course')
            ->get();

        $data[0]['stud_fullName'] = format_name(1, null,  $data[0]['stud_firstName'], $data[0]['stud_middleName'], $data[0]['stud_lastName'], $data[0]['stud_suffix']);
        return $data;
    }

    public function insertOne($data)
    {

        $faker = new Generator();
        $faker->addProvider(new \Faker\Provider\Base($faker));

        $this->stud_studentNo = $data['studentNo'];
        $this->stud_uuid = $faker->uuid();
        $this->stud_firstName = $data['firstName'];
        $this->stud_middleName = $data['middleName'];
        $this->stud_lastName = $data['lastName'];
        $this->stud_suffix = $data['suffix'];
        $this->cour_stud_id = $data['course'];
        $this->stud_yearOfAdmission = $data['yearOfAdmission'];
        $this->stud_admissionType = $data['admissionType'];
        $this->stud_isGraduated = $data['isGraduated'];

        if ($data['isGraduated'] == "YES") {
            $this->stud_dateGraduated = date("Y-m-d", strtotime($data['dateGraduated']));
            $this->stud_honor = $data['honor'];
        } else {
            $this->stud_dateGraduated = null;
            $this->stud_honor = null;
        }

        $this->stud_addressLine = $data['addressLine'];
        $this->stud_addressCity = $data['addressCity'];
        $this->stud_addressProvince = $data['addressProvince'];
        $this->stud_recordStatus = 'UNVALIDATED';
        $this->save();

        return $this->id;
    }

    public function fetchAll($filter)
    {

        $user = \Auth::user();
        $user_roleID = $user->roles->pluck('id')->toArray()[0];

        if ($user_roleID == 2) {
            if ($filter) {
                array_push($filter, array(["user_stud_id" => $user->id]));
            } else {
                $filter = ["user_stud_id" => $user->id];
            }
        }

        $data = $this->leftJoin('s_course', 'cour_stud_id', '=', 'cour_id')
            ->selectRaw('r_student.*
            , md5(stud_id) as stud_id_md5
            , cour_name as stud_course_name
            , cour_code as stud_course')
            ->where($filter)
            ->get();

        $i = 0;
        foreach ($data as $profile) {

            $data[$i]['stud_fullName'] = format_name(1, null,  $profile['stud_firstName'], $profile['stud_middleName'], $profile['stud_lastName'], $profile['stud_suffix']);
            $i++;
        }

        return $data;
    }

    public function edit($md5Id, $data)
    {
        $user = \Auth::user();
        $user_roleID = $user->roles->pluck('id')->toArray()[0];

        if ($user_roleID == 2) {
            $data["stud_recordStatus"] = "UNVALIDATED";
        }

        $this->whereRaw('md5(stud_id) = "' . $md5Id . '"')
            ->update($data);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(stud_id) = "' . $md5Id . '"')
            ->delete();
    }
}
