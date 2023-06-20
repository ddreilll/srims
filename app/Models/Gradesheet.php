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

    public function students()
    {
        return $this->belongsToMany(StudentProfile::class, 't_student_enrolled_subjects', 'class_enrsub_id', 'stud_enrsub_id')->withPivot([
            'enrsub_midtermGrade'
            ,'enrsub_finalGrade'
            ,'enrsub_finalRating'
            ,'enrsub_grade_status'
            ,'enrsub_rowNo'
            ,'grdsheetpg_enrsub_id']);
    }

    public function pages()
    {
        return $this->hasMany(Page::class, 'grdsheetpg_gradesheet_id');
    }

}