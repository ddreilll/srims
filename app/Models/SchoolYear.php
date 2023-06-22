<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolYear extends Model
{
    use SoftDeletes;

    public $table = 's_school_year';
    public $primaryKey = 'syear_id';

    const CREATED_AT = 'syear_createdAt';
    const UPDATED_AT = 'syear_updatedAt';
    const DELETED_AT = 'syear_deletedAt';

    protected $fillable = [
        'syear_year',
    ];

    protected $dates = [
        'syear_createdAt',
        'syear_updatedAt',
        'syear_deletedAt',
    ];

    public function scopeOrder($query)
    {
        return  $query->orderBy('syear_year');
    }
}
