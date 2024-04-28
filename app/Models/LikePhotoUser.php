<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class LikePhotoUser extends Pivot
{
    protected $table = 'like_photo_user';

    public $timestamps = false;

    protected $fillable = [
        'photo_id',
        'user_id',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function photo(): BelongsTo
    {
        return $this->belongsTo(Photo::class);
    }
}
