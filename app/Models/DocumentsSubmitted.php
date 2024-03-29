<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentsSubmitted extends Model
{
    use SoftDeletes;

    public $table = 't_submitted_documents';
    public $primaryKey = 'subm_id';

    const CREATED_AT = 'subm_createdAt';
    const UPDATED_AT = 'subm_updatedAt';
    const DELETED_AT = 'subm_deletedAt';

}
