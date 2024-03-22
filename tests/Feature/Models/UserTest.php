<?php

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

test('relaciona Album com User', function () {
    $user = User::factory()->create();

    Album::factory()->create(['author_id' => $user->getKey()]);
    Photo::factory()->create(['author_id' => $user->getKey()]);

    expect($user->albums())->toBeInstanceOf(HasMany::class)
        ->and($user->photos())->toBeInstanceOf(HasMany::class)
        ->and($user->albums)->toContainOnlyInstancesOf(Album::class)
        ->and($user->photos)->toContainOnlyInstancesOf(Photo::class);
});
