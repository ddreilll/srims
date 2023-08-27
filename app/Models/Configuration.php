<?php

namespace App\Models;

use Sushi\Sushi;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    public $table = 'configurations';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'key',
        'value',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
