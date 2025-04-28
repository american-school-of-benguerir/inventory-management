<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;


class Credential extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'password', 'type'];

    // Encrypt the password before saving it
    public function setPasswordAttribute($value)
    {
    $this->attributes['password'] = Crypt::encryptString($value);  // Encrypt password
    }

    // Decrypt the password when accessed
    public function getPasswordAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Log the error and return a default message or an empty string
            Log::error('Failed to decrypt password: ' . $e->getMessage());
            return 'Decryption failed';
        }
    }


    public function devices()
    {
        return $this->belongsToMany(Device::class, 'device_credential', 'credential_id', 'device_id');
    }
}
