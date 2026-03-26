<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Leader extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'nickname',
        'role',
        'image_id',
        'description',
        'long_description',
        'email',
        'phone',
        'birth_date',
        'profession',
        'hobbies',
        'jubla_highlight',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function roleAssignments(): HasMany
    {
        return $this->hasMany(LeaderRoleAssignment::class);
    }

    public function courseAssignments(): HasMany
    {
        return $this->hasMany(LeaderCourseAssignment::class);
    }

    public function leaderRoles(): BelongsToMany
    {
        return $this->belongsToMany(LeaderRole::class, 'leader_role_assignments')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'leader_course_assignments')
            ->withPivot('sort_order')
            ->withTimestamps();
    }
}
