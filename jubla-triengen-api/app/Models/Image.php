<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    protected $fillable = [
        'file_id',
        'gallery_id',
        'height',
        'width',
        'alt_text',
        'sort_order',
    ];

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }

    public function galleriesAsCover(): HasMany
    {
        return $this->hasMany(Gallery::class, 'cover_image_id');
    }

    public function pagesAsHeroImage(): HasMany
    {
        return $this->hasMany(Page::class, 'hero_image_id');
    }

    public function pageSections(): HasMany
    {
        return $this->hasMany(PageSection::class);
    }

    public function leaders(): HasMany
    {
        return $this->hasMany(Leader::class);
    }

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
