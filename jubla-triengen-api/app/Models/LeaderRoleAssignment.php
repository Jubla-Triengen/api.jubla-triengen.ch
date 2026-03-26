<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaderRoleAssignment extends Model
{
    protected $fillable = [
        'leader_id',
        'leader_role_id',
        'sort_order',
    ];

    public function leader(): BelongsTo
    {
        return $this->belongsTo(Leader::class);
    }

    public function leaderRole(): BelongsTo
    {
        return $this->belongsTo(LeaderRole::class);
    }
}
