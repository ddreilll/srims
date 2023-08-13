<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gradesheet extends Model
{
    use SoftDeletes;

    public $table = 's_class';
    public $primaryKey = 'class_id';

    const CREATED_AT = 'class_createdAt';
    const UPDATED_AT = 'class_updatedAt';
    const DELETED_AT = 'class_deletedAt';


    public function getSchedule($room, $timeSlots)
    {
        $sched_timeSlot_day = "";
        $sched_timeSlot_time = "";

        if (sizeOf($timeSlots) == 1) {
            $sched_timeSlot_day .= ($timeSlots[0]['time_day']) ? $timeSlots[0]['time_day'] : "";
            $sched_timeSlot_time .= ($timeSlots[0]['time_duration']) ? $timeSlots[0]['time_duration'] : "";
        } else if (sizeOf($timeSlots) >= 1) {

            for ($a = 0; $a < sizeOf($timeSlots); $a++) {

                if ($a == 0) { // start

                    $sched_timeSlot_day .= ($timeSlots[$a]['time_day']) ? $timeSlots[$a]['time_day'] . "/" : "";
                    $sched_timeSlot_time .= ($timeSlots[$a]['time_duration']) ? $timeSlots[$a]['time_duration'] . "/" : "";
                } else if (($a != sizeOf($timeSlots) - 1) && ($a > 0 && $a < sizeOf($timeSlots) - 1)) { // mid

                    $sched_timeSlot_day .= ($timeSlots[$a]['time_day']) ? $timeSlots[$a]['time_day'] . "/" : "";
                    $sched_timeSlot_time .= ($timeSlots[$a]['time_duration']) ? $timeSlots[$a]['time_duration'] . "/" : "";
                } else if ($a == sizeOf($timeSlots) - 1) { // last

                    $sched_timeSlot_day .= ($timeSlots[$a]['time_day']) ? $timeSlots[$a]['time_day'] : "";
                    $sched_timeSlot_time .= ($timeSlots[$a]['time_duration']) ? $timeSlots[$a]['time_duration'] : "";
                }
            }
        }

        return ($sched_timeSlot_day ? $sched_timeSlot_day : "") . ($sched_timeSlot_time ? " " . $sched_timeSlot_time : "") . ($room ? " " . $room : "");
    }

    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class, 'time_class_id');
    }

    public function students()
    {
        return $this->belongsToMany(StudentProfile::class, 't_student_enrolled_subjects', 'class_enrsub_id', 'stud_enrsub_id')->withPivot([
            'enrsub_midtermGrade', 'enrsub_finalGrade', 'enrsub_finalRating', 'enrsub_grade_status', 'enrsub_rowNo', 'grdsheetpg_enrsub_id'
        ]);
    }

    public function pages()
    {
        return $this->hasMany(Page::class, 'grdsheetpg_gradesheet_id');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class, 'subj_id', 'class_subj_id');
    }

    public function instructor()
    {
        return $this->hasOne(Instructor::class, 'inst_id', 'class_inst_id');
    }

    public function semester()
    {
        return $this->hasOne(Term::class, 'term_id', 'class_term_id');
    }

    public function room()
    {
        return $this->hasOne(Room::class, 'room_id', 'class_room_id');
    }
}
