<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    protected $fillable = [
        'access_loggable_id',
        'access_loggable_type',
        'ip_address',
        'country_code',
        'user_agent',
    ];

    public function accessLoggable()
    {
        return $this->morphTo();
    }
}
