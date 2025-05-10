<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function getYearCreatedAtAttribute()
    {
        // return $this->create_at-> date_format('Y');
        // return date_format(date_create($this->created_at), 'Y');
        return Carbon::now()->format('Y');
    }
}
