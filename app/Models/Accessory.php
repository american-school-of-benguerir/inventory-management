<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Accessory extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'accessories';

    // Define the fillable attributes (columns that can be mass assigned)
    protected $fillable = [
        'name',   // Name of the accessory
        'type',   // Type of the accessory
        'quantity', // Quantity of the accessory
    ];

    // Optionally, you can also define the table columns that should be cast to a specific data type
    protected $casts = [
        'quantity' => 'integer', // Ensure quantity is cast to integer
    ];
    public function devices()
    {
        return $this->belongsToMany(Device::class, 'device_accessories')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
