<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentsType extends Model
{
    use SoftDeletes;

    public $table = 's_documents_type';
    public $primaryKey = 'docuType_id';

    const CREATED_AT = 'docuType_createdAt';
    const UPDATED_AT = 'docuType_updatedAt';
    const DELETED_AT = 'docuType_deletedAt';

    protected $fillable = [
        'docuType_name',
        'docuType_document',
    ];

    protected $dates = [
        'docuType_createdAt',
        'docuType_updatedAt',
        'docuType_deletedAt',
    ];

}
