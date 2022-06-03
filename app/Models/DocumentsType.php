<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentsType extends Model
{
    use SoftDeletes;

    protected $table = 's_documents_type';
    protected $primaryKey = 'docuType_id';

    const CREATED_AT = 'docuType_createdAt';
    const UPDATED_AT = 'docuType_updatedAt';
    const DELETED_AT = 'docuType_deletedAt';

}
