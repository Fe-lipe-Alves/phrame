<?php

use App\Actions\Album\AlbumUpdate;
use App\Models\Album;

test('atualiza um album existente', function () {
    $newTitle = 'Título Editado';
    $album = Album::factory()->create();

    $updated = AlbumUpdate::handle($album, ['title' => $newTitle]);

    expect($updated)->toBeTrue()->and($album)->title->toEqual($newTitle);
});

test('atualiza album pela API', function () {
    $user = $this->withAuth();
    $newTitle = 'Título Editado';
    $album = Album::factory()->create(['author_id' => $user->getKey()]);

    $route = route('album.update', ['album' => $album->getKey()]);
    $this->actingAs($user)
        ->patch(
            $route,
            [
                ...$album->toArray(),
                'title' => $newTitle,
            ]
        )
        ->assertStatus(200)
        ->assertJson(['success' => true]);

    $this->assertDatabaseHas($album->getTable(), [
        'id' => $album->getKey(),
        'title' => $newTitle,
    ]);
});
