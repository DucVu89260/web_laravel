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
        'gender',
        'birth_date',
        'status',
        'course_id',
    ];

    public function getYearCreatedAtAttribute()
    {
        // return $this->create_at-> date_format('Y');
        // return date_format(date_create($this->created_at), 'Y');
        return Carbon::now()->format('Y');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
