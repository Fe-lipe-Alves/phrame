<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhotoCam extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'photo_id',
        'brand',
        'model',
        'focal_length',
        'open',
        'iso',
        'shutter_speed',
    ];

    public function photo(): BelongsTo
    {
        return $this->belongsTo(Photo::class);
    }
}
