<?php

use App\Actions\Album\AlbumCreate;
use App\Actions\Album\AlbumDelete;
use App\Models\Album;

function createAlbum(): Album
{
    return Album::factory()->create();
}

test('deleta registro Album', function () {
    $this->withAuth();

    $album = createAlbum();

    $deleted = AlbumDelete::handle($album);

    expect($deleted)->toBeTrue()
        ->and($album)
        ->deleted_at->not()->toBeNull();
});

test('deleta registro pela API', function () {
    $user = $this->withAuth();

    $data = createAlbum()->toArray();

    $album = AlbumCreate::handle($data);

    $this->actingAs($user)
        ->delete(route('album.destroy', ['album' => $album->getKey()]))
        ->assertStatus(204);
});
