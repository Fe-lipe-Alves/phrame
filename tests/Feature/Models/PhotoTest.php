<?php

use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

test('relaciona Photo com User', function () {
    $user = $this->withAuth();
    $photo = Photo::factory()->create([
        'author_id' => $user->getKey(),
    ]);

    expect($photo->author())->toBeInstanceOf(BelongsTo::class)
        ->and($photo->author)->toBeInstanceOf(User::class)
        ->and($photo->author->id)->toEqual($user->getKey());
});
