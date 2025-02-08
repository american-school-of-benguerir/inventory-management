<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeviceCredential extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'username',
        'password',
        'type',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
