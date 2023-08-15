<?php

namespace App\Traits;

use Carbon\Carbon;

trait Archivable
{
    public function archived()
    {
        return  !is_null($this->archived_at);
    }

    public function scopeOnlyArchived($query)
    {
        return $query->whereNotNull('archived_at');
    }

    public function scopeWithoutArchived($query)
    {
        return $query->whereNull('archived_at');
    }

    public function archive()
    {
        $this->archived_at = Carbon::now();
        return $this->save();
    }

    public function unarchive()
    {
        $this->archived_at = NULL;
        return $this->save();
    }
}
