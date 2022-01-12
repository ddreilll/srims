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
        $this->save();

        return $this->year_id;
    }
}
