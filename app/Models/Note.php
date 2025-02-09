<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'device_id',
        'created_by'
    ];

    // Define relationship to the Device model
    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    // Define relationship to the User model (who created the note)
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
