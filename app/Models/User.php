<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{   

    use Notifiable;
    use HasFactory;

    public $timestamps = false;
    // Not to include both created_at and updated_at fields simultaneously

    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
    ];
}
