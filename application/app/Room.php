<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 's_room';
    protected $primaryKey = 'room_id';

    const CREATED_AT = 'room_dateCreated';
    const UPDATED_AT = 'room_dateUpdated';

    public function insertOne($data)
    {

        $this->room_name = $data['name'];
        $this->save();

        return $this->id;
    }

    public function fetchAll($filter)
    {

        $data = $this->where($filter)
            ->where(["room_isDeleted" => "0"])
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
            ->update(['room_isDeleted' => '1']);
    }
}
