<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type_id',
        'os',
        'os_version',
        'serial_number',
        'mac_address',
        'ram',
        'processor',
        'disk_spaces',
        'model',
        'make',
        'assignee_id',
        'switch',
        'port',
        'notes',
        'last_updated_by',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'last_updated_by');
    }

    public function accessories()
    {
        return $this->hasMany(DeviceAccessory::class);
    }

    public function credentials()
    {
        return $this->hasMany(DeviceCredential::class);
    }
}
