<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'author_id',
        'title',
        'description',
        'url',
        'size',
    ];

    protected $perPage = 30;

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
