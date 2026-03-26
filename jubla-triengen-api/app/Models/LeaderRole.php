<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LeaderRole extends Model
{
    protected $fillable = [
        'key',
        'label',
        'description',
    ];

    public function assignments(): HasMany
    {
        return $this->hasMany(LeaderRoleAssignment::class);
    }

    public function leaders(): BelongsToMany
    {
        return $this->belongsToMany(Leader::class, 'leader_role_assignments')
            ->withPivot('sort_order')
            ->withTimestamps();
    }
}
