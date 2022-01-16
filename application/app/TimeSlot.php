<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $table = 's_time_slot';
    protected $primaryKey = 'time_id';

    const CREATED_AT = 'time_dateCreated';
    const UPDATED_AT = 'time_dateUpdated';


    public function insertOne($scheduleId, $data)
    {
        $this->insert(["sche_time_id" => $scheduleId
        , "time_day" => $data['day']
        , "time_duration" => $data['time']]);
    }
}
