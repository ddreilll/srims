<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeSlot extends Model
{
    use SoftDeletes;

    protected $table = 's_time_slot';
    protected $primaryKey = 'time_id';

    const CREATED_AT = 'time_createdAt';
    const UPDATED_AT = 'time_updatedAt';
    const DELETED_AT = 'time_deletedAt';

    public function fetchAll($filter)
    {
        return $this
            ->whereRaw($filter)
            ->get();
    }

    public function insertOne($scheduleId, $data)
    {
        $this->insert([
            "sche_time_id" => $scheduleId, "time_day" => $data['day'], "time_duration" => $data['time']
        ]);
    }

    public function permanentRemove($where)
    {
        $this->where($where)
            ->forceDelete();
    }
}
