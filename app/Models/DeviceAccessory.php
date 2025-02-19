<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceAccessory extends Model
{
    protected $fillable = ['device_id', 'accessory_id', 'quantity'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function accessory()
    {
        return $this->belongsTo(Accessory::class);
    }
}
