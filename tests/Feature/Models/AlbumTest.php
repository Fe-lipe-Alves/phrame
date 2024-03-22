<?php

use App\Models\Album;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

test('relaciona Album com User', function () {
    $user = $this->withAuth();
    $album = Album::factory()->create([
        'author_id' => $user->getKey(),
    ]);

    expect($album->author())->toBeInstanceOf(BelongsTo::class)
        ->and($album->author)->toBeInstanceOf(User::class)
        ->and($album->author->id)->toEqual($user->getKey());
});
