<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Honor extends Model
{
    use SoftDeletes;

    public $table = 's_honor';
    public $primaryKey = 'honor_id';

    const CREATED_AT = 'honor_createdAt';
    const UPDATED_AT = 'honor_updatedAt';
    const DELETED_AT = 'honor_deletedAt';

    protected $fillable = [
        'honor_name',
    ];

    protected $dates = [
        'honor_createdAt',
        'honor_updatedAt',
        'honor_deletedAt',
    ];
}
