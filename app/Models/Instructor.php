<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{

    use SoftDeletes, HasFactory;

    protected $table = 's_instructor';
    protected $primaryKey = 'inst_id';

    const CREATED_AT = 'inst_createdAt';
    const UPDATED_AT = 'inst_updatedAt';
    const DELETED_AT = 'inst_deletedAt';

    public function insertOne($data)
    {
        $this->inst_empNo = $data['emp_no'];
        $this->inst_firstName = $data['first_name'];
        $this->inst_middleName = $data['middle_name'];
        $this->inst_lastName = $data['last_name'];
        $this->inst_suffix = $data['suffix_name'];
        $this->save();

        return $this->id;
    }

    public function fetchAll($filter)
    {
        $data = $this->where($filter)
            ->selectRaw('s_instructor.*, md5(inst_id) AS inst_id_md5')
            ->get();


        $i = 0;
        foreach ($data as $instructor) {
            $data[$i]['inst_fullName'] = format_name(
                1,
                "",
                $instructor['inst_firstName'],
                $instructor['inst_middleName'],
                $instructor['inst_lastName'],
                $instructor['inst_suffix']
            );

            $i++;
        }

        return $data;
    }

    public function fetchOne($md5Id)
    {
        $data = $this->whereRaw('md5(inst_id) = "' . $md5Id . '"')
            ->selectRaw('s_instructor.*, md5(inst_id) AS inst_id_md5')
            ->get();

        $data[0]['inst_fullName'] = format_name(
            1,
            "",
            $data[0]['inst_firstName'],
            $data[0]['inst_middleName'],
            $data[0]['inst_lastName'],
            $data[0]['inst_suffix']
        );

        return $data;
    }

    public function edit($md5Id, $data)
    {
        $this->whereRaw('md5(inst_id) = "' . $md5Id . '"')
            ->update([
                'inst_empNo' => $data['emp_no'],
                'inst_firstName' => $data['first_name'],
                'inst_middleName' => $data['middle_name'],
                'inst_lastName' => $data['last_name'],
                'inst_suffix' => $data['suffix_name']
            ]);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(inst_id) = "' . $md5Id . '"')
            ->delete();
    }
}
