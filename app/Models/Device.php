<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Device extends Model
{
    use HasFactory;

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
        'last_updated_by',
    ];

    // Relationship with the Type model
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Relationship with the Assignee (User) model
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    // Relationship with the Last Updated By (User) model
    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'last_updated_by');
    }
}
