<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    public $table = 's_room';
    public $primaryKey = 'room_id';

    const CREATED_AT = 'room_createdAt';
    const UPDATED_AT = 'room_updatedAt';
    const DELETED_AT = 'room_deletedAt';

    protected $fillable = [
        'room_name',
    ];

    protected $dates = [
        'cour_createdAt',
        'cour_updatedAt',
        'cour_deletedAt',
    ];
}
