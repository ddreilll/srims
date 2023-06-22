<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    use SoftDeletes;

    public $table = 's_term';
    public $primaryKey = 'term_id';

    const CREATED_AT = 'term_createdAt';
    const UPDATED_AT = 'term_updatedAt';
    const DELETED_AT = 'term_deletedAt';

    protected $fillable = [
        'term_order',
        'term_name',
    ];

    protected $dates = [
        'term_createdAt',
        'term_updatedAt',
        'term_deletedAt',
    ];

    public function scopeOrder($query)
    {
        return $query->orderBy('term_order');
    }

    public function scopeOrderDesc($query)
    {
        return $query->orderBy('term_order', 'desc');
    }
}
