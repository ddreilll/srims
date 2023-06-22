<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradesheetPages extends Model
{
    use SoftDeletes;

    public $table = 's_gradesheet_page';
    public $primaryKey = 'grdsheetpg_id';

    const CREATED_AT = 'grdsheetpg_createdAt';
    const UPDATED_AT = 'grdsheetpg_updatedAt';
    const DELETED_AT = 'grdsheetpg_deletedAt';

}