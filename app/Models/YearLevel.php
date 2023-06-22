<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YearLevel extends Model
{
    use SoftDeletes;

    public $table = 's_year_level';
    public $primaryKey = 'year_id';

    const CREATED_AT = 'year_createdAt';
    const UPDATED_AT = 'year_updatedAt';
    const DELETED_AT = 'year_deletedAt';

    protected $fillable = [
        'year_order',
        'year_name',
    ];

    protected $dates = [
        'year_createdAt',
        'year_updatedAt',
        'year_deletedAt',
    ];

    public function scopeOrder($query)
    {
        return $query->orderBy('year_order');
    }

    public function scopeOrderDesc($query)
    {
        return $query->orderBy('year_order', 'desc');
    }
}
