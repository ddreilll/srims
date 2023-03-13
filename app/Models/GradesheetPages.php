<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradesheetPages extends Model
{
    use SoftDeletes;

    protected $table = 's_gradesheet_page';
    protected $primaryKey = 'grdsheetpg_id';

    const CREATED_AT = 'grdsheetpg_createdAt';
    const UPDATED_AT = 'grdsheetpg_updatedAt';
    const DELETED_AT = 'grdsheetpg_deletedAt';

}