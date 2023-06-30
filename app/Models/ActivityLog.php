<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity;
use App\Models\User;

class ActivityLog extends Activity
{
    public function user()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }
}
