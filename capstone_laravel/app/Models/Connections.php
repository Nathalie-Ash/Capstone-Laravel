<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connections extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'connection_id',
        'state',
    ];
    public function sender()
    {
        return $this->belongsTo(User::class, 'connection_id', 'id');
    }

    
}
