<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public $table = 's_gradesheet_page';
    public $primaryKey = 'grdsheetpg_id';

    const CREATED_AT = 'grdsheetpg_createdAt';
    const UPDATED_AT = 'grdsheetpg_updatedAt';
    const DELETED_AT = 'grdsheetpg_deletedAt';

    public function gradesheet()
    {
        return $this->belongsTo(Gradesheet::class, 'grdsheetpg_gradesheet_id');
    }

    public function students()
    {
        return $this->belongsToMany(StudentProfile::class, 't_student_enrolled_subjects', 'grdsheetpg_enrsub_id', 'stud_enrsub_id')->withPivot(['enrsub_midtermGrade', 'enrsub_finalGrade', 'enrsub_finalRating', 'enrsub_grade_status', 'enrsub_rowNo']);
    }

    public function studentGradesheets()
    {
        return $this->hasMany(StudentGradesheet::class, 'grdsheetpg_enrsub_id', 'grdsheetpg_id');
    }
}
