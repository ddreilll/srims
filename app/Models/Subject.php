<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    public $table = 's_subject';
    public $primaryKey = 'subj_id';

    protected $fillable = [
        'subj_code',
        'subj_name',
        'subj_units',
    ];

    const CREATED_AT = 'subj_createdAt';
    const UPDATED_AT = 'subj_updatedAt';
    const DELETED_AT = 'subj_deletedAt';
}
