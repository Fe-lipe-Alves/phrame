<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'author_id',
        'title',
        'description',
        'url',
        'size',
        'private',
    ];

    protected $casts = [
        'private' => 'boolean'
    ];

    protected $perPage = 30;

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function cam(): HasOne
    {
        return $this->hasOne(PhotoCam::class);
    }

    public function likedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'like_photo_user')
            ->using(LikePhotoUser::class)
            ->orderByPivot('created_at', 'desc');
    }

    public function scopeWithPrivate(Builder $query): void
    {
        $query->where('private', true);
    }

    public function scopeOnlyPublic(Builder $query): void
    {
        $query->where('private', false);
    }

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => url(Storage::url($value)),
        );
    }
}
