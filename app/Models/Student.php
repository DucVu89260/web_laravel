<?php

namespace App\Models;

use App\Enums\StudentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'birth_date',
        'status',
        'avatar',
        'course_id',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getAgeAttribute(): int
    {
        return date_diff(date_create($this->birth_date), date_create('now'))->y;
    }

    public function getYearCreatedAtAttribute()
    {
        // return $this->create_at-> date_format('Y');
        // return date_format(date_create($this->created_at), 'Y');
        return Carbon::now()->format('Y');
    }

    public function getGenderNameAttribute()
    {   
        return $this->gender === 0 ? 'Female' : 'Male';
    }

    public function getStatusNameAttribute()
    {   
        return StudentStatusEnum::getKeyByValue($this->status);
    }

    public function filterStatus(int $status)
    {
        return $this->where('status', $status);
    }

    public function getAvatarAttribute()
    {
        //
    }
}
