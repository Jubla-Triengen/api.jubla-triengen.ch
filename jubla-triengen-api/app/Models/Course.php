<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'key',
        'label',
    ];

    public function assignments(): HasMany
    {
        return $this->hasMany(LeaderCourseAssignment::class);
    }

    public function leaders(): BelongsToMany
    {
        return $this->belongsToMany(Leader::class, 'leader_course_assignments')
            ->withPivot('sort_order')
            ->withTimestamps();
    }
}
