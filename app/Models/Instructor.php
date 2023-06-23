<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{

    use SoftDeletes, HasFactory;

    public $table = 's_instructor';
    public $primaryKey = 'inst_id';

    const CREATED_AT = 'inst_createdAt';
    const UPDATED_AT = 'inst_updatedAt';
    const DELETED_AT = 'inst_deletedAt';

    protected $fillable = [
        'inst_empNo',
        'inst_firstName',
        'inst_middleName',
        'inst_lastName',
    ];

    protected $dates = [
        'inst_createdAt',
        'inst_updatedAt',
        'inst_deletedAt',
    ];

    public function getFullnameAttribute()
    {
        return sprintf('%s %s', $this->inst_firstName, $this->inst_lastName);
    }

    public function scopeOrder($query)
    {
        return $query->orderBy('inst_firstName');
    }
}
