<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreviousSchool extends Model
{
    use SoftDeletes;

    public $table = 't_external_school';
    public $primaryKey = 'extsch_id';

    const CREATED_AT = 'extsch_createdAt';
    const UPDATED_AT = 'extsch_updatedAt';
    const DELETED_AT = 'extsch_deletedAt';
}

 
