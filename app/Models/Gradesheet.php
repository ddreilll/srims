<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gradesheet extends Model
{
    use SoftDeletes;

    protected $table = 's_class';
    protected $primaryKey = 'class_id';

    const CREATED_AT = 'class_createdAt';
    const UPDATED_AT = 'class_updatedAt';
    const DELETED_AT = 'class_deletedAt';
}