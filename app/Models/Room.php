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

    public function insertOne($data)
    {

        $this->room_name = $data['name'];
        $this->save();

        return $this->id;
    }

    public function fetchAll($filter)
    {

        $data = $this->where($filter)
            ->selectRaw('s_room.*, md5(room_id) AS room_id_md5')
            ->get();

        return $data;
    }

    public function fetchOne($md5Id)
    {

        $data = $this->whereRaw('md5(room_id) = "' . $md5Id . '"')
            ->selectRaw('s_room.*, md5(room_id) AS room_id_md5')
            ->get();

        return $data;
    }

    public function edit($md5Id, $data)
    {

        $this->whereRaw('md5(room_id) = "' . $md5Id . '"')
            ->update([
                'room_name' => $data['name']
            ]);
    }

    public function remove($md5Id)
    {

        $this->whereRaw('md5(room_id) = "' . $md5Id . '"')
            ->delete();
    }
}
