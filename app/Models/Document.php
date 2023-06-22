<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    public $table = 's_documents';
    public $primaryKey = 'docu_id';

    const CREATED_AT = 'docu_createdAt';
    const UPDATED_AT = 'docu_updatedAt';
    const DELETED_AT = 'docu_deletedAt';

    protected $fillable = [
        'docu_name',
        'docu_description',
        'docu_category',
    ];

    protected $dates = [
        'docu_createdAt',
        'docu_updatedAt',
        'docu_deletedAt',
    ];

    public function getIsPermanentAttribute()
    {
        return ($this->docu_isPermanent == "YES") ? true : false;
    }
}
