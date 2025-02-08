<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DeviceAccessory extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'name',
        'brand',
        'model',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
