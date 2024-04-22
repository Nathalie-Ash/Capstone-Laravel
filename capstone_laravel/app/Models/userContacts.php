<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class userContacts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'connection_id',
        'state',
        'sent', 
        'instagram',
        'phone_number',
        'tiktok',
        'linkedIn'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'connection_id', 'id');
    }
}
