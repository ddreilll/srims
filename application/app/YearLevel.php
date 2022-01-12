<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YearLevel extends Model
{
    protected $table = 's_year_level';
    protected $primaryKey = 'year_id';

    const CREATED_AT = 'year_dateCreated';
    const UPDATED_AT = 'year_dateUpdated';

    public function insertOne($data)
    {
        $this->year_name = $data['name'];
        $this->year_order = sizeOf($this->fetchAll([])) + 1;
        $this->save();

        return $this->year_id;
    }

    public function fetchAll($filter)
    {
        $data = $this->where($filter)
            ->where(["year_isDeleted" => "0"])
            ->selectRaw('s_year_level.*, md5(year_id) as year_id_md5')
            ->orderBy('year_order')
            ->get();

        return $data;
    }

    public function fetchOne($md5Id)
    {
        $data = $this->whereRaw('md5(year_id) = "' . $md5Id . '"')
            ->selectRaw('s_year_level.*, md5(year_id) AS year_id_md5')
            ->get();

        return $data;
    }

    public function edit($md5Id, $data)
    {
        $this->whereRaw('md5(year_id) = "' . $md5Id . '"')
            ->update($data);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(year_id) = "' . $md5Id . '"')
            ->update(['year_isDeleted' => '1']);
    }
}
