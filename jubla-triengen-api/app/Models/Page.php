<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'hero_image_id',
        'hero_title',
        'hero_subtitle',
    ];

    public function heroImage(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'hero_image_id');
    }

    public function settings(): HasMany
    {
        return $this->hasMany(PageSetting::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(PageSection::class);
    }

    public function contactInfos(): HasMany
    {
        return $this->hasMany(ContactInfo::class);
    }

    public function legalSections(): HasMany
    {
        return $this->hasMany(LegalSection::class);
    }
}
