<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    use SoftDeletes;

    protected $table = 's_term';
    protected $primaryKey = 'term_id';

    const CREATED_AT = 'term_createdAt';
    const UPDATED_AT = 'term_updatedAt';
    const DELETED_AT = 'term_deletedAt';

    public function insertOne($data)
    {
        $this->term_name = $data['name'];
        $this->term_order = sizeOf($this->fetchAll([])) + 1;
        $this->save();

        return $this->term_id;
    }

    public function fetchAll($filter)
    {
        $data = $this->where($filter)
            ->selectRaw('s_term.*, md5(term_id) as term_id_md5')
            ->orderBy('term_order')
            ->get();

        return $data;
    }

    public function fetchOne($md5Id)
    {
        $data = $this->whereRaw('md5(term_id) = "' . $md5Id . '"')
            ->selectRaw('s_term.*, md5(term_id) AS term_id_md5')
            ->get();

        return $data;
    }

    public function edit($md5Id, $data)
    {
        $this->whereRaw('md5(term_id) = "' . $md5Id . '"')
            ->update($data);
    }

    public function remove($md5Id)
    {
        $this->whereRaw('md5(term_id) = "' . $md5Id . '"')
            ->delete();
    }
}
