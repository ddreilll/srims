<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    public $table = 's_course';
    public $primaryKey = 'cour_id';

    const CREATED_AT = 'cour_createdAt';
    const UPDATED_AT = 'cour_updatedAt';
    const DELETED_AT = 'cour_deletedAt';

    protected $fillable = [
        'cour_code',
        'cour_name',
    ];

    protected $dates = [
        'cour_createdAt',
        'cour_updatedAt',
        'cour_deletedAt',
    ];
}
