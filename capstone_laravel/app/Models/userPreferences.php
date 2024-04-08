<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class userPreferences extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'school',
        'major',
        'minor',
        'campus',
        'outdoorItem1',
        'outdoorItem2',
        'outdoorItem3',
        'indoorItem1',
        'indoorItem2',
        'indoorItem3',
        'musicItem1',
        'musicItem2',
        'musicItem3',
        'movieItem1',
        'movieItem2',
        'movieItem3',
        'description',
        'displayName',
    
    ];

    

}


